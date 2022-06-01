<?php defined('BASEPATH') || exit('Access Denied.');

class AdminModel extends CI_Model {
    public $id, $username, $email, $super;
    
    public function logged_in() {
        $session = $this->session->userdata('admin_session');

        if( ! is_null( $session ) && (
               isset( $session['id'] )
            && isset( $session['username'] )
            && isset( $session['email'] )
            && isset( $session['super'] )
        ) ) {

            $this->id       = $session['id'];
            $this->username = $session['username'];
            $this->email    = $session['email'];
            $this->super    = $session['super'];

            return true;
        }
            
        return $this->_check_remember_me();
    }

    public function details() {
        return [
            'id'        => $this->id,
            'username'  => $this->username,
            'email'     => $this->email,
            'super'     => $this->super
        ];
    }

    public function login( $identifier, $password, $remember = false ) {
        $this->load->database();

        $identifier = strtolower($identifier);

        $row = $this->db->where('username', $identifier)->or_where('email', $identifier)->get('admin_users')->row();

        if( $row ) {
            if( password_verify( $password, $row->password ) ) {
                if( $remember && $remember == 'remember-me' ) {
                    $this->load->helper( 'string' );

                    $token = md5( $row->id . random_string( 'alnum', 16 ) );

                    $this->db->where( 'id', $row->id )->set('remember_token', $token)->update('admin_users');

                    $this->input->set_cookie([
                        'name' => 'remember_token',
                        'value' => $token,
                        'expire' => 2629746 * 12
                    ]);

                }

                $this->_create_session( $row );

                return true;
            }
        }

        return false;
    }

    public function logout() {
        $this->_destroy_session();
    }

    public function reset_password($password, $token) {
        $row = $this->db->where('forget_token', $token)->get('admin_users')->row_array();

        if( $row ) {
            $this->db->where('id', $row['id'])->set('password', password_hash($password, PASSWORD_DEFAULT))->update('admin_users');

            return true;
        }

        return false;
    }

    public function send_reset_token($identifier) {
        $identifier = strtolower(trim($identifier));

        $row = $this->db->where('username', $identifier)->or_where('email', $identifier)->get('admin_users')->row_array();

        if( $row ) {
            $this->load->helper('string');

            $token = md5($row['id'] . $row['email'] . time() . random_string());

            $this->db->where('id', $row['id'])->set('forget_token', $token)->update('admin_users');
	
            $smtp = $this->options->get('smtp-status');

            $config = [];

            if($smtp) {
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = $this->options->get('smtp-host');
                $config['smtp_port'] = $this->options->get('smtp-port');
                $config['smtp_user'] = $this->options->get('smtp-username');
                $config['smtp_pass'] = $this->options->get('smtp-password');
            } 

            $this->load->library('email', [], 'emailer');

            $this->emailer->initialize($config);

            $this->emailer->from($this->options->get('contact-email'), $this->options->get('website-title') . ' Mailer');
            $this->emailer->from($this->options->get('contact-email'));


            $this->emailer->subject('Password Reset Request - ' . $this->options->get('website-title') );
            $this->emailer->message(
                'A request to reset the password was submitted for the user: "' . $row['email'] . '" - If you want to proceed with this request. <a href="' . admin_base_url('auth/reset?token=' . $token) . '">Click Here</a> to reset your password.' 
            );

            $this->emailer->send();

            return true;
        }

        return false;
    }

    public function update_self($username, $email, $password) {
        $username = strtolower($username);
        $email    = strtolower($email);

        $data = [];

        if( $this->username != $username ) {
            $data['username'] = $username;
        }

        if( $this->email != $email ) {
            $data['email'] = $email;
        }

        if( $password ) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if( count($data) ) {
            $this->load->database();

            if( $this->db->set($data)->where('id', $this->id)->update('admin_users') ) {
                $this->_reload_session($this->id);
                return true;
            }
        }

        return false;
    }

    public function create_user($username, $email, $password) {
        $username = strtolower($username);
        $email    = strtolower($email);

        $this->load->database();

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'super' => false
        ];

        if( $this->db->insert('admin_users', $data) ) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function update_user($id, $username, $email, $password) {
        $username = strtolower($username);
        $email    = strtolower($email);

        $this->load->database();

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'super' => false
        ];

        if( $this->db->where('id', $id)->set($data)->update('admin_users') ) {
            return $this->db->where('id', $id)->get('admin_users')->row_array();
        }

        return false;
    }

    public function get_user($id) {
        $this->load->database();

        return $this->db->where('id', $id)->get('admin_users')->row_array();
    }

    public function all_users() {
        $this->load->database();

        return $this->db->get('admin_users')->result_array();
    }

    public function delete_user($id) {
        $this->load->database();

        return $this->db->where('id', $id)->delete('admin_users');
    }

    private function _reload_session($id) {
        $this->load->database();

        $row = $this->db->where('id', $id)->get('admin_users')->row();

        if($row) {
            return $this->_create_session($row);
        }
    }

    private function _create_session( $data ) {
        $this->session->set_userdata('admin_session', [
            'id' => $data->id,
            'username' => $data->username,
            'email' => $data->email,
            'super' => $data->super
        ]);

        return $this->logged_in();
    }

    private function _destroy_session() {
        $this->id       = null;
        $this->username = null;
        $this->email    = null;
        $this->super    = null;

        delete_cookie( 'remember_token' );
        $this->session->unset_userdata('admin_session');

        $this->session->set_flashdata('alert', [
            'type' => 'success',
            'message' => 'Logged out successfully.'
        ]);
    }

    private function _check_remember_me() {
        $token = $this->input->cookie( 'remember_token' );

        if( $token ) {
            $this->load->database();

            $row = $this->db->where( 'remember_token', $token )->get('admin_users')->row();
            if( $row ) {
                return $this->_create_session($row);
            } else {
                delete_cookie( 'remember_token' );
            }
        }

        return false;
    }
}