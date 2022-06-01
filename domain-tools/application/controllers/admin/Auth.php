<?php defined('BASEPATH') || exit('Access Denied.');

class Auth extends FrontController {
    public function __construct() {
        parent::__construct();

        $this->load->model('Auth/AdminModel');

        $this->load->vars('update', $this->bitflan_installer->is_update_possible());
    }

    public function index() {
        if( $this->AdminModel->logged_in() ) {
            redirect( admin_base_url( 'dashboard' ) );
        }

        $flash = $this->session->flashdata('alert');

        $alert = [
            'type' => null,
            'message' => ''
        ];

        if( ! is_null( $flash ) )
            $alert = $flash;

        if( $this->input->post( 'auth-type' ) == 'login' ) {
            $recaptcha = false;

            if($this->options->get('recaptcha-status')) {
                $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $this->options->get('recaptcha-secret-key') . "&response=" . $this->input->post('g-recaptcha-response') . "&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            
                if($response['success'])
                    $recaptcha = true;
            } else $recaptcha = true;

            if($recaptcha) {
                $identifier = $this->input->post( 'identifier' );
                $password   = $this->input->post( 'password' );
                $remember   = $this->input->post( 'remember-me' );

                $this->load->library( 'form_validation' );

                $this->form_validation->set_rules('identifier', 'Username / E-Mail', 'required|max_length[255]', [
                        'required' => 'This field is required.',
                        'max_length' => 'The value you provided is too long!'
                ]);

                $this->form_validation->set_rules('password', 'Password', 'required', [
                    'required' => 'This field is required.'
                ]);

                if( $this->form_validation->run() ) {

                    if( $this->AdminModel->login( $identifier, $password, $remember ) ) {
                        $this->bitflan_installer->confirm_license();
                        $redirect_url = $this->input->get('redirect');
                        if( $redirect_url ) {
                            redirect( $redirect_url );
                        } else 
                            redirect( admin_base_url( 'dashboard' ) );
                    } else {
                        $alert = [
                            'type' => 'error',
                            'message' => 'Your credentials are invalid.'
                        ];
                    }

                } else {
                    $alert = [
                        'type' => 'error',
                        'message' => 'There were some errors in your form.'
                    ];
                }
            } else {
                $alert = [
                    'type' => 'error',
                    'message' => 'ReCaptcha Validation is Required.'
                ];
            }
        }

        $this->load->admin_view( 'login', [
            'title' => 'Login',
            'alert' => $alert
        ] );
    }

    public function reset() {
        if( $this->AdminModel->logged_in() ) {
            redirect( admin_base_url( 'dashboard' ) );
        }

        if( DEMO_MODE ) {
            redirect( admin_base_url( 'auth' ) );
        }

        $flash = $this->session->flashdata('alert');

        $alert = [
            'type' => null,
            'message' => ''
        ];

        if( ! is_null( $flash ) )
            $alert = $flash;

        $token = $this->input->get('token');
        
        if( $this->input->post('auth-type') ) {
            $recaptcha = false;

            if($this->options->get('recaptcha-status')) {
                $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $this->options->get('recaptcha-secret-key') . "&response=" . $this->input->post('g-recaptcha-response') . "&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            
                if($response['success'])
                    $recaptcha = true;
            } else $recaptcha = true;

            if($recaptcha) {
                if( $this->input->post( 'auth-type' ) == 'send-reset' ) {
                    $identifier = $this->input->post( 'identifier' );
        
                    $this->load->library( 'form_validation' );
        
                    $this->form_validation->set_rules('identifier', 'Username / E-Mail', 'required|max_length[255]', [
                            'required' => 'This field is required.',
                            'max_length' => 'The value you provided is too long!'
                    ]);
        
                    if( $this->form_validation->run() ) {
        
                        if( $this->AdminModel->send_reset_token($identifier) ) {
                            $alert = [
                                'type' => 'success',
                                'message' => 'Password Reset Token sent to your E-Mail.'
                            ];
                        } else {
                            $alert = [
                                'type' => 'error',
                                'message' => 'Invalid Username or E-Mail provided.'
                            ];
                        }
        
                    } else {
                        $alert = [
                            'type' => 'error',
                            'message' => 'There were some errors in your form.'
                        ];
                    }
                } else if($token && $this->input->post('auth-type') == 'reset') {
                    $password      = $this->input->post( 'password' );
                    $password_conf = $this->input->post( 'password_conf' );
        
                    $this->load->library('form_validation');
        
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                    $this->form_validation->set_rules('password_conf', 'Confirmation', 'required|matches[password]');
        
                    if( $this->form_validation->run() ) {
        
                        if( $this->AdminModel->reset_password($password, $token) ) {
                            $this->session->set_flashdata('alert', [ 'type' => 'success', 'message' => 'Password reset successfully.' ]);
                            redirect(admin_base_url('auth'));
                        } else {
                            $alert = [
                                'type' => 'error',
                                'message' => 'Invalid Password Reset Token.'
                            ];
                        }
        
                    } else {
                        $alert = [
                            'type' => 'error',
                            'message' => 'There were some errors in your form.'
                        ];
                    }
                }
            } else {
                $alert = [
                    'type' => 'error',
                    'message' => 'ReCaptcha Validation is Required.'
                ];
            }
        }

        $this->load->admin_view( 'reset', [
            'title'   => 'Reset Password',
            'token'   => $token,
            'alert'   => $alert
        ] );
    }

    public function logout() {
        $this->AdminModel->logout();

        redirect( admin_base_url( 'auth' ) );
    }

    public function settings() {
        if( ! $this->AdminModel->logged_in() )
            redirect( admin_auth_url() );

        $alert = [
            'type' => null,
            'message' => ''
        ];

        if( $this->input->post('submit') ) {            
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->database();
            $this->load->library('form_validation');

            if(
                   $username != $this->AdminModel->username
                || $email != $this->AdminModel->email
                || $password
            ) {
                if($username != $this->AdminModel->username)
                    $this->form_validation->set_rules('username', 'Username', 'required|max_length[255]|is_unique[admin_users.username]', [
                        'is_unique' => 'That username already exists.'
                    ]);

                if($email != $this->AdminModel->email)
                    $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique[admin_users.email]', [
                        'is_unique' => 'That e-mail is already being used.'
                    ]);

                if($password) {
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', [
                        'min_length' => 'Must be atleast 8 characters.'
                    ]);
                }

                if( $this->form_validation->run() ) {
                    if( $this->AdminModel->update_self($username, $email, $password) ) {
                        $alert = [
                            'type' => 'success',
                            'message' => "Account updated successfully."
                        ];
                    } else {
                        $alert = [
                            'type' => 'error',
                            'message' => "There was a system error."
                        ];
                    }
                } else {
                    $alert = [
                        'type' => 'error',
                        'message' => "There were some errors in your form."
                    ];
                }
            }
        }

        $this->load->admin_page('auth/settings', [
            'title' => 'Account Settings',
            'admin_user' => $this->AdminModel->details(),
            'alert' => $alert
        ]);
    }

    public function create() {
        if( ! $this->AdminModel->logged_in() )
            redirect( admin_auth_url() );

        if( ! $this->AdminModel->super )
            redirect( admin_base_url() );

        $alert = [
            'type' => null,
            'message' => ''
        ];

        if( $this->input->post('submit') ) {
            $username = $this->input->post('username');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->database();
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required|max_length[255]|is_unique[admin_users.username]');
            $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique[admin_users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', [
                'min_length' => 'Must be atleast 8 characters.'
            ]);

            if( $this->form_validation->run() ) {
                if( $id = $this->AdminModel->create_user( $username, $email, $password ) ) {
                    $this->session->set_flashdata('alert', [
                        'type' => 'success',
                        'message' => 'Account created successfully!'
                    ]);

                    redirect(admin_base_url('auth/edit/' . $id));
                } else $alert = [
                    'type' => 'error',
                    'message' => 'There was a system error.'
                ];
            } else $alert = [
                    'type' => 'error',
                    'message' => 'There were some errors in your form.'
                ];
        }

        $this->load->admin_page('auth/create', [
            'title' => 'Create Account',
            'admin_user' => $this->AdminModel->details(),
            'alert' => $alert
        ]);
    }

    public function edit( $id = null ) {
        if( ! $this->AdminModel->logged_in() )
            redirect( admin_auth_url() );

        if( ! $this->AdminModel->super )
            redirect( admin_base_url() );

        if( ! is_null($id) && is_numeric($id) && $user = $this->AdminModel->get_user($id) ) {

            if($user['id'] == $this->AdminModel->id)
                redirect( admin_base_url('auth/settings') );

            $alert = [
                'type' => null,
                'message' => ''
            ];
    
            if( $this->input->post('submit') ) {
                $username = $this->input->post('username');
                $email    = $this->input->post('email');
                $password = $this->input->post('password');
    
                if(
                       $username != $user['username']
                    || $email != $user['email']
                    || $password
                ) {
                    $this->load->database();
                    $this->load->library('form_validation');

                    if( $username != $user['username'] )
                        $this->form_validation->set_rules('username', 'Username', 'required|max_length[255]|is_unique[admin_users.username]');

                    if( $email != $user['email'] )
                        $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|is_unique[admin_users.email]');

                    if( $password ) {
                        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', [
                            'min_length' => 'Must be atleast 8 characters.'
                        ]);
                    }

                    if( $this->form_validation->run() ) {
                        if( $user = $this->AdminModel->update_user( $id, $username, $email, $password ) ) {
                            $alert = [
                                'type' => 'success',
                                'message' => 'Account updated successfully!'
                            ];
                        } else $alert = [
                            'type' => 'error',
                            'message' => 'There was a system error.'
                        ];
                    } else $alert = [
                            'type' => 'error',
                            'message' => 'There were some errors in your form.'
                        ];
                }
            }
    
            $this->load->admin_page('auth/edit', [
                'title' => 'Edit Account',
                'admin_user' => $this->AdminModel->details(),
                'this_user' => $user,
                'alert' => $alert
            ]);

        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'error',
                'message' => 'Unknown User'
            ]);

            redirect( admin_base_url('auth/list') );
        }
    }

    public function list() {
        if( ! $this->AdminModel->logged_in() )
            redirect( admin_auth_url() );

        if( ! $this->AdminModel->super )
            redirect( admin_base_url() );

        $this->load->admin_page('auth/list', [
            'title' => 'Account List',
            'admin_user' => $this->AdminModel->details(),
            'list' => $this->AdminModel->all_users()
        ]);
    }

    public function delete($id = null) {
        if( ! $this->AdminModel->logged_in() )
            redirect( admin_auth_url() );

        if( ! $this->AdminModel->super )
            redirect( admin_base_url() );

        if( ! is_null($id) && is_numeric($id) && $user = $this->AdminModel->get_user($id) ) {
            if( ! $user['super'] && $id != $this->AdminModel->id ) {
                $this->AdminModel->delete_user($id);

                $this->session->set_flashdata('alert', [
                    'type' => 'success',
                    'message' => 'Account deleted successfully.'
                ]);
            } else {
                $this->session->set_flashdata('alert', [
                    'type' => 'error',
                    'message' => 'That account cannot be deleted.'
                ]);
            }
        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'error',
                'message' => 'Unknown account.'
            ]);
        }

        redirect(admin_base_url('auth/list'));
    }
}