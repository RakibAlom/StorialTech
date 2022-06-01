<?php defined('BASEPATH') || exit('Access Denied.');

class FrontController extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if( !$this->bitflan_installer->is_installed ) {
            die($this->load->view('install/pages/not_installed', [ 'base_url' => install_path() ], true));
        }

        $this->load->model('Modules/PagesModel');

        $this->load->vars(array(
            'pages' => $this->PagesModel->get()
        ));

        $this->lang->load('global', 'main');
    }
}