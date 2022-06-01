<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends FrontController {
	public function index() {
        $response = 'error';

        if( $symbol = $this->input->get('symbol') ) {
            if($this->CurrencyModel->set($symbol)) {
                $response = 'success';
            }
        }

        echo $response;
	}
}
