<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Clearcache extends CI_Migration {
	
    public function up() {
		$this->load->driver('cache', array('adapter' => 'file'));
		$this->cache->clean();
    }

    public function down() {
        
    }
}