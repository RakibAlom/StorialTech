<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_lookup extends FrontController {
	public function index() {
        $this->lang->load('tools', 'main');

		$this->theme->view('pages/ip_lookup', [
		 	'title' => 'Reverse IP Lookup',

            'js_errors' => [
                'invalid_ip' => lang('errors_invalid_ip'),
                'unknown_ip' => lang('errors_unknown_ip'),
            ],

             'scripts' => [$this->theme->url('assets/js/components/ip_lookup.js')]
		]);
	}

    public function query() {
        $this->lang->load('tools', 'main');
        
        $response = array(
            "type" => "error",
            "message" => lang('errors_invalid_ip')
        );

        $ip = trim($this->input->post('ip'));

        if($ip) {
            $response = array(
                "type" => "success",
                "message" => gethostbyaddr($ip)
            );
        }

        echo json_encode($response);
    }
}
