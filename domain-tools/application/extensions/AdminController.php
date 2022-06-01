<?php defined('BASEPATH') || exit('Access Denied.');

class AdminController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    
        if( !$this->bitflan_installer->is_installed ) {
            die($this->load->view('install/pages/not_installed', [ 'base_url' => install_path() ], true));
        }

        $this->load->model('Auth/AdminModel');

        $this->_verify_auth();

        $this->load->vars('update', $this->bitflan_installer->is_update_possible());

        if( $this->options->get('lsnc') == 'unverified' ) {
            ob_start();
            $this->lsnc();
            echo ob_get_clean();
            exit;
        }
    }

    protected function _verify_auth() {
        if( ! $this->AdminModel->logged_in() ) {
            $this->session->set_flashdata( 'alert', [
                'type' => 'error',
                'message' => 'You must login before accessing that page.'
            ] );

            redirect( admin_auth_url() );
        } else {
            $this->load->vars([
                'admin_user' => $this->AdminModel->details()
            ]);
        }
    }

    protected function lsnc() {
        $error = null;

        if($this->input->post('submit')) {
            $code = $this->input->post('purchase_code');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('purchase_code', 'Purchase Code', 'required');

            if($this->form_validation->run()) {
                $data = $this->bitflan_installer->add_new_license($code);

                if($data['code'] == 200) {
                    redirect(admin_base_url('dashboard'));
                } else {
                    $error = $data['message'];
                }
            }
        }

        $this->load->view('install/pages/license_again', [
            'title' => 'License Verification',
            'error' => $error,
            'base_url' => base_url()
        ]);
    }
}