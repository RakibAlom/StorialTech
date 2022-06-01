<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends FrontController {
	public function index($slug = null) {
		if( !$slug )
			redirect(base_url());

		$page = $this->PagesModel->getBySlug(strtolower($slug));

		if($page && $page['status']) {
			$this->theme->view('pages/page', [
				'title' => $page['title'],
				'page' => $page
			]);
		} else show_404();
	}
}
