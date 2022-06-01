<?php defined('BASEPATH') || exit('Access Denied.');

class Options extends AdminController {
    public function index($url = null) {
        redirect( admin_base_url() );
    }

    public function general() {
        $this->options->set_options_page( 'general' );

        $this->load->admin_page('options', [
            'title'   => 'General Settings'
        ]);
    }

    public function ads() {
        $this->options->set_options_page( 'ads' );

        $this->load->admin_page('options', [
            'title'   => 'Ad Spots'
        ]);
    }

    public function assets() {
        $this->options->set_options_page( 'assets' );

        $this->load->admin_page('options', [
            'title'   => 'Additional Assets'
        ]);
    }

    public function contact() {
        $this->options->set_options_page( 'contact' );

        $this->load->admin_page('options', [
            'title'   => 'Contact Settings'
        ]);
    }

    public function api() {
        $this->options->set_options_page( 'api' );

        $this->load->admin_page('options', [
            'title'   => 'API Settings'
        ]);
    }

    public function features_faqs() {
        $this->options->set_options_page( 'features_faqs' );

        $this->load->admin_page('options', [
            'title'   => 'Features & FAQs',
            'page_scripts' => [
                'https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js'
            ]
        ]);
    }

    public function links() {
        $this->options->set_options_page( 'links' );

        $this->load->admin_page('options', [
            'title'   => 'Header / Footer Links'
        ]);
    }

    public function currencies() {
        $this->options->set_options_page('currencies');

        $this->load->model('Modules/CurrencyModel');

        if($this->input->post('action')) {
            $this->output->set_content_type('application/json');

            if($this->input->post('action') == 'status') {
                $code = $this->input->post('symbol');
                $status = $this->input->post('status');
    
                $status = $status == 'true' ? true : false;

                if($code) {
                    if($this->CurrencyModel->set_status($code, $status)) {
                        return $this->output->set_output(json_encode([
                            'message' => 'success'
                        ]));
                    } else {
                        return $this->output->set_output(json_encode([
                            'message' => 'could_not_change_status'
                        ]));
                    }
                }
    
            } else if($this->input->post('action') == 'default') {
                $code = $this->input->post('symbol');
    
                if($code) {
                    if($this->CurrencyModel->set_default($code))  {
                        return $this->output->set_output(json_encode([
                            'message' => 'success'
                        ]));
                    } else {
                        return $this->output->set_output(json_encode([
                            'message' => 'could_not_set_default'
                        ]));
                    }
                }
            } else {
                return $this->output->set_output(json_encode([
                    'message' => 'not_found'
                ]));
            }
        }

        return $this->load->admin_page('currency', [
            'title' => 'Currency Settings',
            'currencies' => $this->CurrencyModel->api ? $this->CurrencyModel->get() : null,
            'page_scripts' => [
                admin_dir_url('assets/js/jquery.min.js')
            ]
        ]);
    }

    public function tld_settings() {
        $alert = null;
        $whois_result = null;

        $this->options->set_options_page('tld_settings');

        if( $this->input->post('affiliate-link-submit') == true ) {
            $link = $this->input->post('affiliate_link');

            $this->load->library('form_validation');

            $this->form_validation->set_rules('affiliate_link', 'Affiliate Link', 'required|valid_url');

            if($this->form_validation->run()) {
                $this->load->model('Modules/TldsModel');

                $this->TldsModel->replace_affiliate_link($link);

                $alert = [
                    'type' => 'success',
                    'message' => 'Affiliate Link for all TLDs replacd successfully.'
                ];
            } else {
                $alert = [
                    'type' => 'error',
                    'message' => 'There were some errors in your Form.'
                ];
            }
        }

        if( $this->input->post('query-whois-submit') == 'true' ) {
            $server = $this->input->post('server');
            $domain = $this->input->post('domain');

            $this->load->library('form_validation');

            $this->form_validation->set_rules('server', 'Server', 'required');
            $this->form_validation->set_rules('domain', 'Domain', 'required');

            if($this->form_validation->run()) {
                $domain = \get_domain($domain);

                $timeout = 5;
                $port    = 43;

                $afp = @fsockopen($server, $port, $errno, $errstr, $timeout);

                if(!$afp)
                    $alert = [
                        'type' => 'error',
                        'message' => 'Invalid WHOIS Server.'
                    ];
                else {
                    fputs($afp, $domain . "\r\n");
                    $out = "";
                    while(!feof($afp)){
                        $out .= fgets($afp);
                    }
                    fclose($afp);

                    $whois_result = $out;
                }
            } else {
                $alert = [
                    'type' => 'error',
                    'message' => 'There were some errors in your Form.'
                ];
            }
        }

        $this->load->admin_page('query-tld-settings', [
            'title'        => 'TLD Settings & Tools',
            'whois_result' => $whois_result,
            'alert'        => $alert
        ]);
    }

    public function themes( $theme = null ) {
        if( !is_null( $theme ) ) {
            if( $this->theme->set_theme( $theme ) )
                $this->session->set_flashdata('theme-update-alert', 'success');
            else
                $this->session->set_flashdata('theme-update-alert', 'error');
        
            redirect( admin_base_url( 'options/themes' ) );
        }

        $alert = $this->session->flashdata('theme-update-alert');
        if( ! $alert )
            $alert = 'blank';

        $this->load->admin_page('themes', [
            'title' => 'Theme Settings',
            'alert'         => $alert,
            'current_theme' => $this->theme->dir(),
            'list'          => $this->theme->theme_list(),
        ]);
    }
}