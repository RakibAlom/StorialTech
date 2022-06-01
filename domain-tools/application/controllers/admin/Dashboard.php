<?php defined('BASEPATH') || exit('Access Denied.');

class Dashboard extends AdminController {
    public function index() {
        $this->load->model('Modules/TldsModel');
        $this->load->model('Modules/PagesModel');

        $this->load->admin_page( 'dashboard', [
            'title' => 'Dashboard',

            'tlds'   => $this->TldsModel->get(),
            'pages'  => $this->PagesModel->get(),
            'admins' => $this->AdminModel->all_users(),
            'theme'  => array(
                'name'    => $this->theme->meta()['name'],
                'version' => $this->theme->meta()['version'],
                'author'  => $this->theme->meta()['author']['name']
            ),

            'page_scripts' => [
                'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'
            ]
        ]);
	}

    public function cache_clean() {
        $this->load->driver('cache', [ 'adapter' => 'file' ]);
        $this->cache->clean();

        $this->session->set_flashdata('alert', [
            'type' => 'success',
            'message' => 'Cache destroyed successfully.'
        ]);

        redirect(admin_base_url('dashboard'));
    }

    public function generate_sitemap() {
        $this->load->model('Modules/PagesModel');

        $date = date('Y-m-d');
        $pages = $this->PagesModel->get();

        ob_start(); ?>
<url>
    <loc><?php echo base_url() ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>1</priority>
</url>

<url>
    <loc><?php echo base_url('domain_generator/') ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
</url>

<url>
    <loc><?php echo base_url('whois/') ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
</url>

<url>
    <loc><?php echo base_url('ip_lookup/') ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
</url>

<url>
    <loc><?php echo base_url('location/') ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
</url>

<url>
    <loc><?php echo base_url('dns_lookup/') ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
</url>

<?php if($this->options->get('contact-page-status')) { ?>
<url>
    <loc><?php echo base_url('contact/') ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
</url>
<?php } ?>

<?php foreach($pages as $page) { ?>
<url>
    <loc><?php echo base_url('page/' . $page['permalink']) ?></loc>
    <lastmod><?php echo $date ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
</url>
<?php } ?>
        <?php

        $contents = ob_get_clean();

        $sitemap = file_get_contents(APPPATH . 'views/admin/sitemap-placeholder.xml');

        $sitemap = str_replace('{{insert}}', $contents, $sitemap);

        file_put_contents(FCPATH . 'sitemap.xml', $sitemap);

        $this->session->set_flashdata('alert', [
            'type' => 'success',
            'message' => 'Successfully Generated Latest Sitemap check here <a href="' . base_url('sitemap.xml') . '">' . base_url('sitemap.xml') . '</a>' 
        ]);

        redirect(admin_base_url('dashboard'));
    }
}