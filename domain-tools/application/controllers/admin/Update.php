<?php defined('BASEPATH') || exit('Access Denied.');

class Update extends AdminController {
    public function index() {
        $this->load->admin_page( 'update', [
            'title' => 'Update',
            'update' => $this->bitflan_installer->is_update_possible()
        ]);
	}

    public function perform() {
        if($this->bitflan_installer->update()) {
            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'Successfully updated the website to a newer version!'
            ]);
        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'danger',
                'message' => 'There was an error updating the script.'
            ]);
        }

        redirect(admin_base_url());
    }
}