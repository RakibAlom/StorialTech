<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if( $this->bitflan_installer->is_installed )
            return redirect( base_url() );
    
        $this->load->library('form_validation');
        $this->load->vars(array(
            'base_url' => install_path()
        ));
    }

    public function index() {
        return $this->load->view('install/pages/index', [
            'title' => 'Welcome to Install',
            'current_page' => 'welcome',
            'next_page' => 'license'
        ]);
    }

    public function license() {
        if($this->bitflan_installer->license_verified()) {
            $error = null;

            if($this->input->post('submit')) {
                $code = $this->input->post('purchase_code');

                $this->form_validation->set_rules('purchase_code', 'Purchase Code', 'required');

                if($this->form_validation->run()) {
                    $data = $this->bitflan_installer->attempt_license_verification($code);

                    if($data['code'] == 200) {
                        redirect(install_path() . 'install/requirements');
                    } else {
                        $error = $data['message'];
                    }
                }
            }

            return $this->load->view('install/pages/license', [
                'title' => 'License Verification',
                'current_page' => 'license',
                'next_page' => 'requirements',
                'error' => $error
            ]);
        } else redirect(install_path() . 'install/requirements' );
    }

    public function requirements() {
       

        $res = $this->bitflan_installer->requirements();

        return $this->load->view('install/pages/requirements', [
            'title' => 'Requirements',
            'status'       => $res,
            'requirements' => $this->bitflan_installer->requirements_table,
            'current_page' => 'requirements',
            'next_page' => 'database'
        ]);
    }

    public function database() {
       

        if( $this->bitflan_installer->requirements() ) {
            if(!$this->bitflan_installer->is_database_setup() && !$this->bitflan_installer->is_db_configured()) {
                $err = false;

                if( $this->input->post('submit') ) {
                    $host = $this->input->post('host');
                    $name = $this->input->post('database');
                    $user = $this->input->post('username');
                    $pass = $this->input->post('password');

                    $this->form_validation->set_rules('host', 'Hostname', 'required');
                    $this->form_validation->set_rules('database', 'Database', 'required');
                    $this->form_validation->set_rules('username', 'Username', 'required');

                    if(!$pass)
                        $pass = '';

                    if($this->form_validation->run()) {
                        if($this->bitflan_installer->verify_db_details($host, $name, $user, $pass)) {
                            $this->bitflan_installer->paste_db_config($host, $name, $user, $pass);

                            redirect(install_path() . 'install/database_setup');
                        } else {
                            $err = true;
                        }
                    }
                }

                return $this->load->view('install/pages/database', [
                    'title' => 'Database',
                    
                    'current_page' => 'database',
                    'next_page' => 'auth',
                    'error' => $err
                ]);
            } else
                redirect(install_path() . 'install/auth' );
        } else
            redirect( install_path() . 'install/requirements' );
    }

    public function database_setup() {
        

        if( $this->bitflan_installer->requirements() ) {
            if(!$this->bitflan_installer->is_database_setup() && $this->bitflan_installer->is_db_configured()) {
                $this->bitflan_installer->setup_database();

                return redirect(install_path() . 'install/auth');
            }
        }

        die("Please Try again by Clicking <a href=\"" . install_path() . "install\">Here</a>.");
    }

    public function auth() {
        

        if(!$this->bitflan_installer->is_admin_setup()) {
            if( $this->bitflan_installer->requirements() ) {
                if($this->bitflan_installer->is_database_setup() && $this->bitflan_installer->is_db_configured()) {
                    $err = false;
    
                    if( $this->input->post('submit') ) {
                        $username = $this->input->post('username');
                        $email    = $this->input->post('email');
                        $password = $this->input->post('password');
    
                        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
                        $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
                        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                        $this->form_validation->set_rules('password_conf', 'Confirmation', 'required|matches[password]');
    
                        if($this->form_validation->run()) {
                            $this->bitflan_installer->create_admin_account($username, $email, $password);
    
                            redirect(install_path() . 'install/finish');
                        }
                    }
    
                    return $this->load->view('install/pages/auth', [
                        'title' => 'Auth',
                        
                        'current_page' => 'auth',
                        'next_page' => 'finish',
                        'error' => $err
                    ]);
                } else
                    redirect(install_path() . 'install/database' );
            } else
                redirect( install_path() . 'install/requirements' );
        } else
            redirect(install_path() . 'install/finish');
    }

    public function finish() {
       

        if($this->bitflan_installer->is_admin_setup()) {
            if( $this->bitflan_installer->requirements() ) {
                if($this->bitflan_installer->is_database_setup() && $this->bitflan_installer->is_db_configured()) {
                    if( $this->input->post('submit') ) {
                        $base_url      = $this->input->post('base_url');
                        $cookie_domain = $this->input->post('cookie_domain');
    
                        $this->form_validation->set_rules('base_url', 'Base URL', 'required|valid_url');
    
                        if($this->form_validation->run()) {
                            $base_url      = trim($base_url, " \t\n\r\0\x0B\\/") . "/";
                            $cookie_domain = $cookie_domain ? trim($cookie_domain) : '';

                            $this->bitflan_installer->paste_app_config($base_url, $cookie_domain);
                            $this->bitflan_installer->complete_installation();
    
                            redirect($base_url);
                        }
                    }
    
                    return $this->load->view('install/pages/finish', [
                        'title' => 'Finish',
                        'cookie_domain' => !in_array($_SERVER['REMOTE_ADDR'], ['localhost', '127.0.0.1', '::1']) ? '.' . get_domain(install_path()) : '',
                        'current_page' => 'finish',
                        'next_page' => 'finish'
                    ]);
                } else
                    redirect(install_path() . 'install/database' );
            } else
                redirect( install_path() . 'install/requirements' );
        } else
            redirect(install_path() . 'install/auth');
    }
}
