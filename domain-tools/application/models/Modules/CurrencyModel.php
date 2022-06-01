<?php defined('BASEPATH') || exit('Access Denied.');

class CurrencyModel extends CI_Model {
    public $currency = 'USD';
    public $api      = true;

    public function __construct() {
        if( $this->options->get('exchangerate-api-status') ) {
            if($this->options->get('enable-currency-selection')) {
                $currency = get_cookie( 'bf-currency-symbol' );

                if($currency) {
                    $currency = strtoupper(trim($currency));
    
                    $this->currency = $currency;
                } else {
                    $this->currency = $this->options->get('default-currency') ? $this->options->get('default-currency') : 'USD';
                    $this->set($this->currency);
                }
            } else if($this->options->get('default-currency')) {
                $this->currency = $this->options->get('default-currency');
            }

        } else
            $this->api = false;
    }

    public function get() {
        $this->load->driver('cache', ['adapter' => 'file']);

        if(!$currencies = $this->cache->get('currencies')) {
            $this->load->database();
            $currencies = $this->getCurrencyValues();

            foreach($currencies as $code => $value) {
                $row = $this->db->select('enabled,default')->from('currencies')->where('code', strtoupper($code))->get()->row_array();

                $currencies[$code] = [
                    'rate' => $value,
                    'enabled' => $row ? $row['enabled'] : true,
                    'default' => $row ? $row['default'] : (strtoupper($code) == 'USD' ? true : false),
                ];

                if(!$row) {
                    $this->db->insert('currencies', [
                        'code' => strtoupper($code),
                        'enabled' => true,
                        'default' => (strtoupper($code) == 'USD') ? true : false
                    ]);
                }
            }

            if(count($currencies))
                $this->cache->save('currencies', $currencies, 86400);
        }

        return $currencies;
    }

    public function set_status($code, $status) {
        $currencies = $this->get();

        if(isset($currencies[$code]) && !$currencies[$code]['default']) {
            $this->load->database();
            $this->load->driver('cache', [ 'adapter' => 'file' ]);

            $currencies[$code]['enabled'] = $status ? true : false;

            $this->db->where('code', $code)->set('enabled', $status ? true : false)->update('currencies');

            $this->cache->save('currencies', $currencies, 86400);

            return true;
        }

        return false;
    }

    public function set_default($code) {
        $currencies = $this->get();

        if(isset($currencies[$code])) {
            $this->load->database();
            $this->load->driver('cache', [ 'adapter' => 'file' ]);

            foreach($currencies as $symb => $data) {
                if($symb == $code) {
                    $currencies[$symb]['default'] = true;

                } else {
                    $currencies[$symb]['default'] = false;
                }
            }

            $this->db->set('default', false)->update('currencies');
            $this->db->where('code', $code)->set('default', true)->update('currencies');

            $this->cache->save('currencies', $currencies, 86400);

            $this->options->set('default-currency', $code);
            $this->options->save();

            return true;
        }

        return false;
    }

    public function set($symbol) {
        $currencies = $this->get();

        if(isset($currencies[$symbol]) && ($currencies[$symbol]['enabled'] || $currencies[$symbol]['default'])) {
            set_cookie('bf-currency-symbol', strtoupper(trim($symbol)), 86400 * 365);

            return true;
        }
    }
    
    public function getCurrencyValues() {
        if( $this->options->get('exchangerate-api-status') ) {
            $key = $this->options->get('exchangerate-api-key');

            $response = json_decode(get_remote_contents( 'https://v6.exchangerate-api.com/v6/' . $key . '/latest/USD' ), true);

            if($response['result'] == 'success')
                return $response['conversion_rates'];
        }

        return null;
    }

    public function convert($value) {
        if( $this->api ) {
            $rates = $this->get();

            if(isset($rates[$this->currency])) {
                return number_format($value * $rates[$this->currency]['rate'], 2) . ' ' . $this->currency;
            }
        }

        return number_format($value, 2) . ' USD';
    }
}