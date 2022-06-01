<?php defined('BASEPATH') || exit('Access Denied.');

class Pages extends AdminController {
    public function __construct() {
        parent::__construct();

        $this->load->model('Modules/PagesModel');
    }

    public function index() {
        $this->load->admin_page( 'pages/home', [
            'title' => 'Pages',
            'pages' => $this->PagesModel->get(),

            'page_scripts' => [
                admin_dir_url('assets/js/jquery.min.js'),
                admin_dir_url('assets/js/sortables.min.js'),
                admin_dir_url('assets/js/pages.js')
            ]
        ]);
	}

    public function order() {
        $order = $this->input->post('order');
        $ref   = $this->input->post('ref');

        if(!DEMO_MODE && $ref == 'admin-panel' && is_array($order = json_decode($order, TRUE))) {
            $this->PagesModel->set_order($order);
        }
    }

    public function add() {
        $alert = null;

        if( !DEMO_MODE && $this->input->post('submit') ) {
			$title     = html_escape($this->security->xss_clean($this->input->post('title')));
            $permalink = html_escape($this->security->xss_clean($this->input->post('permalink')));
            $placement = html_escape($this->security->xss_clean($this->input->post('placement')));
            $body      = $this->security->xss_clean($this->input->post('body'));
            $status    = $this->input->post('status') ? true : false;
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');

            if($permalink) {
                $this->form_validation->set_rules('permalink', 'Permalink', 'required|alpha_dash|is_unique[pages.permalink]');
            } else {
                $permalink = url_title($title, '-', true);
            }

            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_rules('placement', 'Placement', 'required|in_list[header,footer,both]');
        
            if( $this->form_validation->run() ) {
                $id = $this->PagesModel->add($title, $permalink, $body, $placement, $status);

                if($id) {
                    $this->session->set_flashdata('alert', [
                        'type' => 'success',
                        'message' => 'Page created successfully.'
                    ]);
                    redirect(admin_base_url('pages/edit/' . $id));
                }
            } else {
                $alert = [
                    'type' => 'danger',
                    'message' => 'There were some errors in your form.'
                ];
            }
        }

        $this->load->admin_page( 'pages/add', [
            'title' => 'Add Page',
            'alert' => $alert,
            'page_scripts' => [
                admin_dir_url('assets/js/jquery.min.js'),
                'https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js',
                admin_dir_url('assets/js/pages.js'),
            ]
        ]);
    }

    public function edit($id = null) {
        $alert = null;
        $page = $this->PagesModel->getById($id);

        if( !DEMO_MODE && $this->input->post('submit') ) {
            $title     = html_escape($this->security->xss_clean($this->input->post('title')));
            $permalink = html_escape($this->security->xss_clean($this->input->post('permalink')));
            $placement = html_escape($this->security->xss_clean($this->input->post('placement')));
            $body      = $this->security->xss_clean($this->input->post('body'));
            $status    = $this->input->post('status') ? true : false;
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');

            if($permalink && $permalink != $page['permalink']) {
                $this->form_validation->set_rules('permalink', 'Permalink', 'required|alpha_dash|is_unique[pages.permalink]');
            } else {
                $permalink = url_title($title, '-', true);
            }

            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_rules('placement', 'Placement', 'required|in_list[header,footer,both]');
        
            if( $this->form_validation->run() ) {
                if( $this->PagesModel->edit($page['id'], $title, $permalink, $body, $placement, $status) ) {
                    $alert = [
                        'type' => 'success',
                        'message' => 'Page updated successfully.'
                    ];
                } else {
                    $alert = [
                        'type' => 'danger',
                        'message' => 'There was an error updating your page.'
                    ];
                }
            } else {
                $alert = [
                    'type' => 'danger',
                    'message' => 'There were some errors in your form.'
                ];
            }
        }

        $this->load->admin_page( 'pages/edit', [
            'title' => 'Edit Page',
            'alert' => $alert,
            'page'  => $page,
            'page_scripts' => [
                admin_dir_url('assets/js/jquery.min.js'),
                'https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js',
                admin_dir_url('assets/js/pages.js'),
            ]
        ]);
    }

    public function delete($id) {
        if(!DEMO_MODE && $id && $page = $this->PagesModel->getById($id)) {
            $this->PagesModel->delete($id);

            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'Page deleted successfully.'
            ]);
        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'danger',
                'message' => 'Item not found.'
            ]);
        }

        redirect(admin_base_url('pages'));
    }
}