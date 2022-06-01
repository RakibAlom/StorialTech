<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Whois extends FrontController {
	public function index() {
        $this->lang->load('tools', 'main');

		$this->theme->view('pages/whois', [
            'title' => 'WHOIS Information',

            'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

            'scripts' => [$this->theme->url('assets/js/components/whois.js')]
       ]);
	}

    public function search($domain = null) {
        if($domain) {
            $this->lang->load('tools', 'main');

            return $this->theme->view('pages/whois', [
                'title' => 'WHOIS Information',
                'domain' => $domain,

                'js_errors' => [
                    'invalid_domain' => lang('errors_invalid_domain'),
                    'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
                ],

                'scripts' => [$this->theme->url('assets/js/components/whois.js')]
            ]);
        }
        
        show_404();
    }

    public function query() {
        $url = trim($this->input->post('url'));

        echo json_encode($this->_get_whois_data($url));
    }

    public function _get_whois_data($url = null) {
        $this->lang->load('tools', 'main');
        
        $response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );

        if($url && is_valid_url($url)) {
            $url = get_domain($url);
            $tld  = get_tld($url);
    
            $this->load->model('Modules/TldsModel');

            $tld = $this->TldsModel->getByExtension( $tld );

            if($tld) {
                $data = $this->_query_whois($tld['whois_server'], $url);

                if(!$this->_check_pattern($tld['pattern'], $data)) {
                    $response['type'] = 'success';
                    $response['message'] = $data;
                } else {
                    $response['type'] = 'available';
                    $response['message'] = 'Domain is Available for Registration.';
                    $response['link']   = str_replace('{{domain_name}}', $url, $tld['affiliate_link']);
					$response['price']  = convert_price( $tld['price'] );
                }
            }
        }

        return $response;
    }

    public function _query_whois($server, $domain) {
        $timeout = 5;
		$port    = 43;

		$afp = @fsockopen($server, $port, $errno, $errstr, $timeout);

		if(!$afp)
			return false;
		else {
			fputs($afp, $domain . "\r\n");
			$out = "";
			while(!feof($afp)){
				$out .= fgets($afp);
			}
			fclose($afp);
			return $out;
		}
    }

    public function _check_pattern($pattern, $output) {
        return (preg_match("/" . $pattern . "/i", $output) ? 1 : 0);
    }
}
