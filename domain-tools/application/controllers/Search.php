<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends FrontController {
	public function index() {
        $this->lang->load('tools', 'main');

		$this->theme->view('pages/search', [
		 	'title' => 'Domain Search',

			'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

			'scripts' => [$this->theme->url('assets/js/components/search.js')]
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
            $this->load->model('Modules/TldsModel');

			if(count(explode('.', $url)) == 1)
				$url = trim($url, " \t\n\r\0\x0B.") . $this->TldsModel->getMainTld()['tld'];
				
            $url = get_domain($url);
            $tld  = get_tld($url);

            $tld = $this->TldsModel->getByExtension( $tld );

            if($tld) {
                $data = $this->_query_whois($tld['whois_server'], $url);

                if(!$this->_check_pattern($tld['pattern'], $data)) {
                    $response['type'] = 'not-available';
					$response['link'] = base_url('whois/search/' . $url);
                } else {
                    $response['type'] = 'available';
					$response['link']   = str_replace('{{domain_name}}', $url, $tld['affiliate_link']);
					$response['price']  = convert_price( $tld['price'] );
                }

				$allTlds = $this->TldsModel->get();
				$domain = explode('.', $url);

				$response['other_tlds'] = [];
				foreach($allTlds as $entry) {
					if($entry['tld'] != '.' . $domain[1] && $entry['status'])
						$response['other_tlds'][] = $domain[0] . $entry['tld'];
				}

				$response['domain'] = $url;
				$response['suggestions'] = $this->get_suggestions( $domain[0], 'com,net,org,info,mobi,biz,xyz', count($response['other_tlds']) );
            }
        }

        echo json_encode($response);
	}

	public function single_query() {
		$response = array(
            "status" => "blank",
            "link" => "#",
			"price" => null
        );

        $url = trim($this->input->post('url'));
		
        if($url && is_valid_url($url)) {
            $url = get_domain($url);
            $tld  = get_tld($url);
    
            $this->load->model('Modules/TldsModel');

            $tld = $this->TldsModel->getByExtension( $tld );

            if($tld) {
                $data = $this->_query_whois($tld['whois_server'], $url);

				if(!$this->_check_pattern($tld['pattern'], $data)) {
                    $response['status'] = 'not-available';
					$response['link'] = base_url('whois/search/' . $url);
                } else {
                    $response['status'] = 'available';
					$response['link']   = str_replace('{{domain_name}}', $url, $tld['affiliate_link']);
					$response['price']  = convert_price( $tld['price'] );
                }
			}
		}

		echo json_encode($response);
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

	public function get_suggestions($keyword, $tlds, $limit = 100) {
		$keyword = truncate(filter_keyword(trim($keyword)), 28);

		$suggestions = [];

		if($keyword && $tlds) {
			$requestUri     = "https://sugapi.verisign-grs.com/ns-api/2.0/suggest?include-registered=false&tlds=" . $tlds . "&include-suggestion-type=true&sensitive-content-filter=true&use-numbers=true&max-length=32&lang=eng&max-results=" . $limit . "&name=" . $keyword . "&use-idns=false";
	
			$result = json_decode( strtolower( get_remote_contents( $requestUri ) ), true );

			$this->load->model('Modules/TldsModel');
			if(isset($result['results']) && count($result['results'])) {
					foreach($result['results'] as $result) {
						if($result['availability']=='available') {
						$tld = explode('.', $result['name'])[1];
						$tld =  $this->TldsModel->getByExtension($tld);

						$suggestions[] = [
							'name' => $result['name'],
							'affiliate' => str_replace('{{domain_name}}', $result['name'], $tld['affiliate_link']),
							'price' => convert_price($tld['price'])
						];
						}
					}

			}
		}

		return $suggestions;
	}

	public function error_404() {
		$this->theme->view('pages/error_404');
	}
}