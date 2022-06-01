<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Domain_generator extends FrontController {
	public function index() {
        $this->lang->load('tools', 'main');

		$this->theme->view('pages/generator', [
		 	'title' => 'Domain Generator',
			
			'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

			'scripts' => [$this->theme->url('assets/js/components/generator.js')]
		]);
	}

	public function query($suggestedLimit = 100) {
        $this->lang->load('tools', 'main');
		
		$response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );

		$keyword = truncate(filter_keyword(trim($this->input->post('keyword'))), 28);
		$tlds    = $this->input->post('selections');

		if($keyword && $tlds) {
			$cache_var = 'domainer_suggestions_' . tld_to_class($keyword) . '_' . $tlds;

			$this->load->driver('cache', [ 'adapter' => 'file' ]);

			if( !$suggestions = $this->cache->get($cache_var) ) {
				$requestUri     = "https://sugapi.verisign-grs.com/ns-api/2.0/suggest?include-registered=false&tlds=" . $tlds . "&include-suggestion-type=true&sensitive-content-filter=true&use-numbers=true&max-length=32&lang=eng&max-results=" . $suggestedLimit . "&name=" . $keyword . "&use-idns=false";
		
				$result = json_decode( strtolower( get_remote_contents( $requestUri ) ), true );

				$suggestions = [];

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
					if(count($suggestions)%2!==0 && count($suggestions)>2)
						array_pop($suggestions);
					$this->cache->save($cache_var, $suggestions, 60 * 15);
				}
			}

			$response = array(
				'type' => 'success',
				'message' => $suggestions
			);
		}

		echo json_encode($response);
	}
}
