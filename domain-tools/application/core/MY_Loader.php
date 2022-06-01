<?php

class MY_Loader extends CI_Loader {
    public function admin_view( $template, $vars = array(), $return = false ) {
        return $this->view( ADMIN_RESOURCE_PATH . '/' . $template, $vars, $return );
    }

    public function admin_page( $template, $vars = array(), $layout = 'default', $render = true ) {
        $layout_content = $this->admin_view('layouts/' . $layout, $vars, true);
        $page_content   = $this->admin_view($template, $vars, true);

        $page_content = str_replace( '{{content}}', $page_content, $layout_content );

        if($render)
            echo $page_content;
        else
            return $page_content;
    }

    protected function _ci_autoloader() {
		if (file_exists(APPPATH.'config/autoload.php')) {
			include(APPPATH.'config/autoload.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/autoload.php')) {
			include(APPPATH.'config/'.ENVIRONMENT.'/autoload.php');
		}

		if ( ! isset($autoload)) {
			return;
		}

		// Autoload packages
		if (isset($autoload['packages'])) {
			foreach ($autoload['packages'] as $package_path) {
				$this->add_package_path($package_path);
			}
		}

		// Load any custom config file
		if (count($autoload['config']) > 0) {
			foreach ($autoload['config'] as $val) {
				$this->config($val);
			}
		}

		// Autoload helpers and languages
		foreach (array('helper', 'language') as $type) {
			if (isset($autoload[$type]) && count($autoload[$type]) > 0) {
				$this->$type($autoload[$type]);
			}
		}

		// Autoload drivers
		if (isset($autoload['drivers'])) {
			$this->driver($autoload['drivers']);
		}

		// Load libraries
		if (isset($autoload['libraries']) && count($autoload['libraries']) > 0) {
			// Load the database driver.
			if (in_array('database', $autoload['libraries'])) {
				$this->database();
				$autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
			}

			// Load all other libraries
			$this->library($autoload['libraries']);
		}

		// Autoload models
		if (isset($autoload['model'])) {
			$this->model($autoload['model']);
		}

		// Autoload general files
		if (isset($autoload['file'])) {
            foreach($autoload['file'] as $fpath) {
                include_once($fpath);
            }
		}
    }
}