<?php 

namespace Options_lib;

defined('BASEPATH') || exit('Access Denied.');

class FormValidator {
    private $ci;
    private $current;
    private $errors = [];
    private $values = [];
    private $status = 'blank';


    public function __construct( $options ) {
        $this->ci      = &get_instance();
        $this->options = $options;
        $this->ci->load->helper('form');
    }

    public function validate( $form ) {
        if(!defined('DEMO_MODE') || !DEMO_MODE) {
            $this->current = $form;

            $this->ci->load->library('form_validation');
            $rules = [];
    
            foreach( $this->current['fields'] as $key => $field ) {
                $options = isset($field['validation']) ? $field['validation'] : [
                    'rules'  => null,
                    'errors' => []
                ];
    
                if( $options['rules'] ) {
                    $rules[] = [
                        'field' => 'key-' . $key,
                        'label' => $field['label'],
                        'rules' => $options['rules'],
                        'errors' => $options['errors']
                    ];
                }
            }
    
            $res = true;
    
            if(count($rules)) {
                $this->ci->form_validation->set_rules($rules);
    
                $res = $this->ci->form_validation->run();
            }
    
            if($res) {
                $this->status = 'success';
    
                foreach( $this->current['fields'] as $key => $field ) {
                    
                    $result = FieldMap::Validate( $key, $field, $this->ci, $this->options );
    
                    if( $result['error'] ) {
                        $this->status = 'error';
                        $this->errors['key-' . $key] = $result['errors'];
                    } else {
                        if( !isset($field['xss_clean']) || $field['xss_clean'] == true )
                            $result['value'] = $this->ci->security->xss_clean( $result['value'] );
                        if( !isset($field['escape_html']) || $field['escape_html'] == true )
                            $result['value'] = \html_escape($result['value']);

                        if( $this->options->get($key) != $result['value'] )
                            $this->values[$key] = $result['value'];
                    }
                }
            } else {
                $this->status = 'error';
    
                $this->errors = $this->ci->form_validation->error_array();
            }
        }
    }

    public function status() {
        return $this->status;
    }

    public function new_values() {
        return $this->values;
    }

    public function error( $key ) {
        return isset( $this->errors[ 'key-' . $key ] ) ? $this->errors[ 'key-' . $key ] : null;
    }

    public static function GetValue( $key, $default ) {
        return set_value( 'key-' . $key, $default );
    }

    public static function GetSelect( $key, $value, $default ) {
        return set_select( 'key-' . $key, $value, $default );
    }

    public static function GetCheckbox( $key, $value ) {
        return $value ? 'checked' : '';
    }

    public static function GetRadio( $key, $value, $user_value ) {
        return $value == $user_value ? 'checked' : ''; 
    }
}