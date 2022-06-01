<?php defined('BASEPATH') || exit('Access Denied.');

include_once( APPPATH . 'libraries/Options_lib/Classes/FieldMap.php' );
include_once( APPPATH . 'libraries/Options_lib/Classes/FormRenderer.php' );
include_once( APPPATH . 'libraries/Options_lib/Classes/FormValidator.php' );
include_once( APPPATH . 'extensions/Mutator.php' );

class Options_lib {
    private $ci;
    private $config;
    private $mutator;
    private $options_map   = [];
    private $prod_options  = [];
    private $draft_options = [];

    public $current;
    public $validation;
    public $multipart = false;

    public function __construct() {
        $this->ci = &get_instance();

        if($this->ci->bitflan_installer->is_installed) {
            $this->ci->config->load('options');

            $this->config = $this->ci->config->item('options');
            $this->mutator = new Mutator($this->config);
    
            $this->config = $this->mutator->perform_mutations();
    
            $this->_create_map();
            $this->_load_options();
            $this->_sync_options();
    
            $this->_check_submission();
        }
    }

    public function get_sidebar() {
        $sidebar = [];

        foreach($this->config['sections'] as $id => $item) {
            $sidebar[$id] = [
                'name' => $item['name'],
                'icon' => $item['icon'],
                'url'  => admin_base_url( 'options/' . $id )
            ];
        }

        return $sidebar;
    }

    public function get( $opt_name = null ) {
        if( !$opt_name )
            return $this->prod_options;

        else if( isset( $this->prod_options[$opt_name] ) )
            return $this->prod_options[$opt_name];
        else
            return null;
    }

    public function set( $opt, $value ) {
        $this->draft_options[$opt] = $value;
    }

    public function save() {
        $data = [];
        
        foreach($this->draft_options as $key => $value) {
            if( !isset( $this->prod_options[$key] ) || $this->prod_options[$key] != $value ) {
                $data[] = [
                    'key' => $key,
                    'value' => is_array($value) || is_object($value) ? serialize($value) : $value,
                    'autoload' => true
                ];

                if( isset($this->options_map[$key]) && $this->options_map[$key]['type'] != 'repeater' )
                    $value = Options_lib\FieldMap::BeforeSave( $value, $key, $this->options_map[$key], $this, $this->ci );

                $this->prod_options[$key] = $value;
            }
        }

        if(count($data)) {
            $this->ci->load->database();

            $old_values = [];
            foreach($data as $item)
                $old_values[] = $item['key'];

            $this->ci->db->where_in('key', $old_values)->delete($this->config['table']);
            if($this->ci->db->insert_batch( $this->config['table'], $data )) {
                $this->ci->load->driver( 'cache', array( 'adapter' => 'file' ) );

                $this->ci->cache->save( $this->config['cache'], $this->prod_options, 86400 * 30 );

                return true;
            }
            
            return false;
        }

        return true;
    }

    public function set_options_page($page) {
        if( isset( $this->config['sections'][ $page ] ) ) {
            $this->current        = $this->config['sections'][$page];
            $this->current['key'] = $page;
        
            return true;
        }

        return false;
    }

    public function render_form() {
        $render = new Options_lib\FormRenderer( $this );
        $render->start();
    }

    private function _create_map() {
        foreach($this->config['sections'] as $section) {
            foreach($section['fields'] as $key => $meta) {
                if( $meta['type'] == 'repeater' ) {
                    foreach($meta['fields'] as $f_key => $f_meta) {
                        if( $f_meta['type'] == 'image' )
                            $this->multipart = true;
                    }
                }

                if( $meta['type'] == 'image' )
                    $this->multipart = true;
                $this->options_map[$key] = $meta;
            }
        }
    }

    private function _load_options() {
        $this->ci->load->driver( 'cache', array( 'adapter' => 'file' )  );

        if( !$options = $this->ci->cache->get($this->config['cache']) ) {
            $this->ci->load->database();

            $rows = $this->ci->db->get($this->config['table'])->result();

            $options = array();
            foreach($rows as $option) {
                if( is_serialized($option->value) ) {
                    $option->value = unserialize($option->value);
                }

                if( isset($this->options_map[$option->key]) && $this->options_map[$option->key]['type'] != 'repeater' )
                    $option->value = Options_lib\FieldMap::AfterLoad( $option->value, $option->key, $this->options_map[$option->key], $this, $this->ci );

                $options[$option->key] = $option->value;
            }

            $this->ci->cache->save($this->config['cache'], $options, 86400 * 30);
        }

        $this->prod_options = $options;
    }

    private function _sync_options() {
        $synced = true;
        $newVars = [];

        foreach($this->options_map as $key => $meta) {
            if( !isset($this->prod_options[$key]) ) {
                $synced = false;

                $newVars[$key] = $meta;
            }
        }

        if(!$synced) {
            $data = [];
            foreach($newVars as $key => $meta) {
                $val = isset($meta['default']) ? $meta['default'] : '';

                if(in_array($meta['type'], ['repeater', 'multi-select']) && !$val)
                    $val = [];
                $this->set($key, $val);
            }

           $this->save();
        }
    }

    private function _check_submission() {
        $this->validation = new Options_lib\FormValidator( $this );

        if(
            $this->ci->input->post( 'key-submit' ) 
            && $this->ci->input->post( 'form-key' ) 
        ) {
            $form_key = $this->ci->input->post( 'form-key' );

            if( isset( $this->config['sections'][$form_key] ) ) {
                $form        = $this->config['sections'][$form_key];
                $form['key'] = $form_key;

                $this->validation->validate( $form );

                if( $this->validation->status() == 'success' ) {
                    $new_values = $this->validation->new_values();

                    foreach($new_values as $key => $value) {
                        $this->set($key, $value);
                    }

                    $this->save();
                }
            }
        }
    }
}