<?php defined('BASEPATH') || exit('Access Denied.');

class TldsModel extends CI_Model {
    public function get() {
        $this->load->driver('cache', ['adapter' => 'file']);

        if(!$tlds = $this->cache->get('tlds')) {
            $this->load->database();

            $tlds = $this->db->order_by('tld_order', 'asc')->get('tlds')->result_array();

            if(count($tlds))
                $this->cache->save('tlds', $tlds, 86400 * 30);
        }

        return $tlds;
    }

    public function getById($id) {
        $this->load->driver('cache', ['adapter' => 'file']);

        if(!$tld = $this->cache->get('tlds-' . $id)) {
            $this->load->database();

            $tld = $this->db->where('id', $id)->get('tlds')->row_array();

            if($tld) {
                $this->cache->save('tlds-' . $id, $tld, 86400 * 30);
            }
        }

        return $tld;
    }

    public function getByExtension($ext) {
        $ext = '.' . trim($ext, ". \t\n\r\0\x0B");

        $tlds = $this->get();

        foreach($tlds as $tld) {
            if($tld['tld'] == $ext)
                return $this->getById($tld['id']);
        }

        return null;
    }

    public function getMainTld() {
        foreach($this->get() as $item) {
            if($item['is_main'])
                return $item;
        }

        return null;
    }

    public function add($tld, $whois_server, $pattern, $is_main, $is_suggested, $price, $sale_price, $affiliate_link, $status = true) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->insert('tlds', [
            'tld' => $tld,
            'whois_server' => $whois_server,
            'pattern' => $pattern,
            'is_main' => $is_main,
            'is_suggested' => $is_suggested,
            'price' => $price,
            'sale_price' =>  $sale_price,
            'affiliate_link' => $affiliate_link,
            'status' => $status,
            'tld_order' => $this->get_new_tld_order()
        ]);

        $id = $this->db->insert_id();
        if($is_main) {
            $this->set_main_tld($id);
        }

        $this->cache->delete('tlds');

        return $id;
    }

    public function edit($id, $tld, $whois_server, $pattern, $is_main, $is_suggested, $price, $sale_price, $affiliate_link, $status = true) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->where('id', $id)->set([
            'tld' => $tld,
            'whois_server' => $whois_server,
            'pattern' => $pattern,
            'is_suggested' => $is_suggested,
            'price' => $price,
            'sale_price' =>  $sale_price,
            'affiliate_link' => $affiliate_link,
            'status' => $status,
        ])->update('tlds');

        if($is_main) {
            $this->set_main_tld($id);
        }

        $this->cache->delete('tlds-' . $id);
        $this->cache->delete('tlds');

        return true;
    }

    public function delete($id) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->where('id', $id)->delete('tlds');

        $this->cache->delete('tlds-' . $id);
        $this->cache->delete('tlds');

        return true;
    }

    public function update_status($id, $status) {
        $this->load->database();
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->db->where('id', $id)->set('status', $status)->update('tlds');

        $this->cache->delete('tlds-' . $id);
        $this->cache->delete('tlds');
    }

    public function set_main_tld($id) {
        $this->load->database();

        $this->db->set('is_main', 0)->update('tlds');
        $this->db->where('id', $id)->set('is_main', 1)->update('tlds');

        $this->delete_all_cache();

        return true;
    }

    public function delete_all_cache() {
        $this->load->driver('cache', ['adapter' => 'file']);

        $this->cache->delete('tlds');

        foreach($this->get() as $tld) {
            $this->cache->delete('tlds-' . $tld['id']);
        }
    }

    public function set_order($order_ids) {
        $this->load->driver('cache', ['adapter' => 'file']);
        $this->load->database();

        foreach($order_ids as $order => $id) {
            if(!$this->db
            ->where('id', $id)
            ->set('tld_order', $order)
            ->update('tlds'))
                return false;
        }

        $this->cache->delete('tlds');
        return true;
    }

    public function get_new_tld_order() {
        $tlds = $this->get();

        if(count($tlds)) {
            $latest = array_pop($tlds);
            return ($latest['tld_order'] + 1);
        }

        return 0;
    }

    public function replace_affiliate_link($link) {
        $this->load->database();

        $this->db->set('affiliate_link', $link)->update('tlds');

        $this->delete_all_cache();

        return true;
    }
}