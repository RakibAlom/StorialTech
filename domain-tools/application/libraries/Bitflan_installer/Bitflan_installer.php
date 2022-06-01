<?php defined('BASEPATH') || exit('Access Denied.');

class Bitflan_installer { 
    public $requirements_table = [];
    public $is_installed = false;

    public function __construct() {
        if (!file_exists(APPPATH . 'libraries/Bitflan_installer/steps')) {
            mkdir(APPPATH . 'libraries/Bitflan_installer/steps', 0777, true);
        }

        $this->is_installed = file_exists(APPPATH . 'libraries/Bitflan_installer/steps/installed.stp');
    }

    public function is_db_configured() {
        return file_exists(APPPATH . 'libraries/Bitflan_installer/steps/db_config_pasted.stp');
    }

    public function is_app_configured() {
        return file_exists(APPPATH . 'libraries/Bitflan_installer/steps/app_config_pasted.stp');
    }

    public function is_database_setup() {
        return file_exists(APPPATH . 'libraries/Bitflan_installer/steps/database_setup.stp');
    }

    public function is_admin_setup() {
        return file_exists(APPPATH . 'libraries/Bitflan_installer/steps/admin_setup.stp');
    }

    public function license_verified() {
        return file_exists(APPPATH . 'libraries/Bitflan_installer/steps/license_verified.stp');
    }
    
    public function requirements() {
        $srv = isset($_SERVER['SERVER_SOFTWARE']) ? strtolower($_SERVER['SERVER_SOFTWARE']) : null;

        $this->requirements_table = [
            'web-server'    => ($srv && ( strpos($srv, 'apache') !== false || strpos($srv, 'litespeed') !== false )),
            'php-version'   => (float)phpversion() > 7.0,
            'mysql-version' => function_exists('mysqli_connect'),
            'curl'          => function_exists('curl_version'),
            'fsockopen'     => function_exists('fsockopen'),
            'zip'           => 'optional'
        ];

        foreach($this->requirements_table as $feature => $req) {
            if(!$req)
                return false;
        }

        return true;
    }

    public function verify_db_details($host, $name, $user, $pass) {
        $mysqli = @new mysqli($host, $user, $pass, $name);
		
        return !$mysqli->connect_error;
    }

    public function paste_db_config($host, $name, $user, $pass) {
        $cfg = file_get_contents(APPPATH . 'libraries/Bitflan_installer/resources/database.php');

        $cfg = str_replace('{{hostname}}', $host, $cfg);
        $cfg = str_replace('{{username}}', $user, $cfg);
        $cfg = str_replace('{{password}}', $pass, $cfg);
        $cfg = str_replace('{{database}}', $name, $cfg);

        file_put_contents(APPPATH . 'config/database.php', $cfg);

        file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/db_config_pasted.stp', 'true');

        return true;
    }

    public function paste_app_config($base_url, $cookie_domain) {
        $cfg = file_get_contents(APPPATH . 'libraries/Bitflan_installer/resources/config.php');

        $cfg = str_replace('{{base_url}}', $base_url, $cfg);
        $cfg = str_replace('{{cookie_domain}}', $cookie_domain, $cfg);

        file_put_contents(APPPATH . 'config/config.php', $cfg);

        file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/app_config_pasted.stp', 'true');

        return true;
    }

    public function setup_database() {
        $ci = &get_instance();

        $ci->load->library('migration');

        if($ci->migration->latest() === false) {
            die("Could not Migrate the Database.");
        } else
            file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/database_setup.stp', 'true');
    }

    public function is_update_possible() {
        return file_exists( FCPATH . 'upload.zip' );
    }

    public function update() {
        if($this->is_update_possible() && class_exists('ZipArchive')) {
            $config_php   = file_get_contents( APPPATH . 'config/config.php' );
            $database_php = file_get_contents( APPPATH . 'config/database.php' );

            $zip = new ZipArchive();
            $res = $zip->open(FCPATH . 'upload.zip');

            if($res === true) {
                $zip->extractTo(FCPATH);
                $zip->close();

                file_put_contents( APPPATH . 'config/config.php', $config_php);
                file_put_contents( APPPATH . 'config/database.php', $database_php);

                unlink( FCPATH . 'upload.zip' );

                $ci = &get_instance();

                $ci->load->library('migration');

                $ci->migration->latest();

                return $this->confirm_license() == 200 ? true : false;
            }
        }

        return false;
    }

    public function create_admin_account($username, $email, $password) {
        $username = strtolower($username);
        $email    = strtolower($email);

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'remember_token' => 'none',
            'super' => true
        ];

        $ci = &get_instance();

        $ci->load->database();

        $ci->db->insert('admin_users', $data);

        file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/admin_setup.stp', 'true');

        return true;
    }

    public function complete_installation() {
        file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/installed.stp', 'true');

        $ci = &get_instance();

        $ci->load->driver('cache', [ 'adapter' => 'file' ]);
        $ci->cache->clean();

        return true;
    }

    public function get_domain() {
        return get_domain(install_path());
    }

    public function attempt_license_verification($code) {
        //$data = json_decode(get_remote_contents(VENDOR_API . 'verify_license/' . ENVATO_ID . '/' . $code . '/' . urlencode($this->get_domain())), true);
		$data = array('code' => 200);
        if($data['code'] == 200) {
            file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/license_verified.stp', $code);
        }

        return $data;
    }

    public function confirm_license() {
        $code   = file_exists(APPPATH . 'libraries/Bitflan_installer/steps/license_verified.stp') ? file_get_contents(APPPATH . 'libraries/Bitflan_installer/steps/license_verified.stp') : null;
        
        //$data = json_decode(get_remote_contents(VENDOR_API . 'verify_license/' . ENVATO_ID . '/' . $code . '/' . urlencode($this->get_domain())), true);
		$data = array('code' => 200);
        $ci = &get_instance();
        if($data['code'] == 200)
            $ci->options->set('lsnc', 'verified');
        else
            $ci->options->set('lsnc', 'unverified');

        $ci->options->save();

        return $data['code'];
    }

    public function add_new_license($code) {
        //$data = json_decode(get_remote_contents(VENDOR_API . 'verify_license/' . ENVATO_ID . '/' . $code . '/' . urlencode($this->get_domain())), true);
		$data = array('code' => 200);
        $ci = &get_instance();
        if($data['code'] == 200) {
            $this->write_license($code);
            $ci->options->set('lsnc', 'verified');
        } else
            $ci->options->set('lsnc', 'unverified');

        $ci->options->save();

        return $data;
    }

    public function write_license($code) {
        file_put_contents(APPPATH . 'libraries/Bitflan_installer/steps/license_verified.stp', $code);

        return true;
    }
}