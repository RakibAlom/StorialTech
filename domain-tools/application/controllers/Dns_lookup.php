<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dns_lookup extends FrontController {
	public function index() {
        $this->lang->load('tools', 'main');

		$this->theme->view('pages/dns_lookup', [
		 	'title' => 'Query Domain DNS',

            'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

            'scripts' => [$this->theme->url('assets/js/components/dns_lookup.js')]
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

            $dnsRecords = array();

            $dnsRecords[] = ['type' => 'A',     'data' => @dns_get_record($url,DNS_A)];
            $dnsRecords[] = ['type' => 'AAAA',  'data' => @dns_get_record($url,DNS_AAAA)];
            $dnsRecords[] = ['type' => 'MX',    'data' => @dns_get_record($url,DNS_MX)];
            $dnsRecords[] = ['type' => 'CNAME', 'data' => @dns_get_record($url,DNS_CNAME)];
            $dnsRecords[] = ['type' => 'NS',    'data' => @dns_get_record($url,DNS_NS)];
            $dnsRecords[] = ['type' => 'PTR',   'data' => @dns_get_record($url,DNS_PTR)];
            $dnsRecords[] = ['type' => 'SOA',   'data' => @dns_get_record($url,DNS_SOA)];
            $dnsRecords[] = ['type' => 'SRV',   'data' => @dns_get_record($url,DNS_SRV)];
            $dnsRecords[] = ['type' => 'TXT',   'data' => @dns_get_record($url,DNS_TXT)];
    
            $success = false;
            foreach($dnsRecords as $arr) {
                if(count($arr['data']))
                    $success = true;
            }

            if($success) {
                $response = array(
                    "type"    => "success", 
                    "message" => $dnsRecords
                );
            }
        }

        echo json_encode($response);
    }
}
