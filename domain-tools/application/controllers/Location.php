<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends FrontController {
	public function index() {
        $this->lang->load('tools', 'main');

		$this->theme->view('pages/location', [
		 	'title' => 'Domain Location',

            'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

            'scripts' => [$this->theme->url('assets/js/components/location.js')]
		]);
	}

    public function query() {
        $this->lang->load('tools', 'main');
        
        $response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );

        $url = trim($this->input->post('url'));

        if($url && is_valid_url($url)) {
            $url = get_domain($url);
            $ip  = gethostbyname($url);
    
            $success = false;
            if($ip != $url)
                $success = true;


            if($success) {
                $response = array(
                    "type"    => "success", 
                    "message" => $ip
                );
            }
        }

        echo json_encode($response);
    }
}
