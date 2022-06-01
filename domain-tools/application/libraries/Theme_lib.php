<?php defined('BASEPATH') || exit('Access Denied.');

class Theme_lib {
    private $ci;
    private $meta;
    private $dir;

    public function __construct() {
        $this->ci = &get_instance();

        if($this->ci->bitflan_installer->is_installed)
            $this->_load_theme();
    }

    public function view( $name, $vars = [], $return = false ) {
        return $this->ci->load->view( 
            'themes/' . $this->dir . '/' . $name, 
            $vars, 
            $return 
        );
    }

    public function url( $path = '' ) {
        return base_url( 'application/views/themes/' . $this->dir . '/' . $path );
    }

    public function meta() {
        return $this->meta;
    }

    public function dir() {
        return $this->dir;
    }

    public function set_theme( $dir ) {
        if( is_dir( APPPATH . 'views/themes/' . $dir ) ) {
            if( file_exists( APPPATH . 'views/themes/' . $dir . '/meta.json' ) ) {
                $this->ci->load->database();

                $this->ci->db->where('key', 'theme-dir')->limit(1)->delete('options');
                $this->ci->db->insert('options', [
                    'key' => 'theme-dir',
                    'value' => $dir,
                    'autoload' => true
                ]);

                $this->ci->load->driver('cache', [ 'adapter' => 'file' ]);
                $this->ci->cache->save('theme', $dir, 86400 * 30);

                $this->_load_theme();

                return true;
            }
        }

        return false;
    }

    public function theme_list() {
        $scan = scandir( APPPATH . 'views/themes' );
        $list = [];

        foreach( $scan as $item ) {
            if( is_dir( APPPATH . 'views/themes/' . $item ) ) {
                $path = APPPATH . 'views/themes/' . $item;

                if( file_exists( $path . '/meta.json' ) ) {
                    $meta = json_decode(file_get_contents( $path . '/meta.json' ), true);
                    $meta['theme-dir'] = $item; 
                    $meta['preview']   = base_url('application/views/themes/' . $item . '/' . $meta['preview']);

                    $list[] = $meta;
                }
            }
        }

        return $list;
    }

    private function _load_theme() {
        $this->ci->load->driver( 'cache', [ 'adapter' => 'file' ] );

        if( ! $theme = $this->ci->cache->get( 'theme' ) ) {
            $this->ci->load->database();

            $row = $this->ci->db->where( 'key', 'theme-dir' )->limit(1)->get('options')->row_array();

            if($row) {
                $theme = $row['value'];
            } else {
                $theme = 'default';

                $this->ci->db->insert( 'options', [
                    'key' => 'theme-dir',
                    'value' => $theme,
                    'autoload' => true
                ] );
            }
            
            $this->ci->cache->save( 'theme', $theme, 86400 * 30 );
        }

        $this->dir = $theme;

        $this->_load_meta();
    }

    private function _load_meta() {
        $meta = file_exists( APPPATH . 'views/themes/' . $this->dir . '/meta.json' ) ? json_decode(file_get_contents(APPPATH . 'views/themes/' . $this->dir . '/meta.json'), true) : [
            'name' => 'Default Theme',
            'version' => 1.0,
            'author' => [
                'name' => 'Bitflan',
                'url'  => 'https://bitflan.com'
            ],
            'preview' => 'assets/_preview.jpg'
        ];

        $this->meta = $meta;
    }
}