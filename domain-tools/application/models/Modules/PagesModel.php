<?php defined('BASEPATH') || exit('Access Denied.');

class PagesModel extends CI_Model {
    public function get() {
        $this->load->driver('cache', ['adapter' => 'file']);

        if(!$pages = $this->cache->get('pages')) {
            $this->load->database();

            $pages = $this->db->select('id,title,permalink,placement,status,order')->order_by('order', 'asc')->get('pages')->result_array();

            if(count($pages))
                $this->cache->save('pages', $pages, 86400 * 30);
        }

        return $pages;
    }

    public function getOrganized() {
        $raw = $this->get();

        $pages = [
            'header' => [],
            'footer' => [],
            'both'   => []
        ];

        foreach($raw as $page) {
            $pages[$page['placement']] = $page;
        }

        return $pages;
    }

    public function getById($id) {
        $this->load->driver('cache', ['adapter' => 'file']);

        if(!$page = $this->cache->get('pages-' . $id)) {
            $this->load->database();

            $page = $this->db->where('id', $id)->get('pages')->row_array();

            if($page) {
                $page['body'] = html_entity_decode($page['body']);

                $this->cache->save('pages-' . $id, $page, 86400 * 30);
            }
        }

        return $page;
    }

    public function getBySlug($slug) {
        $pages = $this->get();

        foreach($pages as $page) {
            if($page['permalink'] == $slug)
                return $this->getByid($page['id']);
        }

        return null;
    }

    public function add($title, $permalink, $body, $placement, $status = true) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->insert('pages', [
            'title' => $title,
            'permalink' => $permalink,
            'body' => htmlentities($body),
            'placement' => $placement,
            'status' => $status,
            'order' => $this->get_new_page_order()
        ]);

        $this->cache->delete('pages');

        return $this->db->insert_id();
    }

    public function edit($id, $title, $permalink, $body, $placement, $status = true) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->where('id', $id)->set([
            'title' => $title,
            'permalink' => $permalink,
            'body' => htmlentities($body),
            'placement' => $placement,
            'status' => $status
        ])->update('pages');

        $this->cache->delete('pages-' . $id);
        $this->cache->delete('pages');

        return true;
    }

    public function delete($id) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->where('id', $id)->delete('pages');

        $this->cache->delete('pages-' . $id);
        $this->cache->delete('pages');

        return true;
    }

    public function set_order($order_ids) {
        $this->load->driver('cache', ['adapter' => 'file']);
        $this->load->database();

        foreach($order_ids as $order => $id) {
            if(!$this->db
            ->where('id', $id)
            ->set('order', $order)
            ->update('pages'))
                return false;
        }

        $this->cache->delete('pages');
        return true;
    }

    public function get_new_page_order() {
        $pages = $this->get();

        if(count($pages)) {
            $latest = array_pop($pages);
            return ($latest['order'] + 1);
        }

        return 0;
    }
}