<?php 

namespace Options_lib\Fields;

defined('BASEPATH') or exit('Access Denied.');

class Base {
    protected $key;
    protected $repeater;
    protected $field;
    protected $dom;
    protected $error;
    protected $hooks;

    public function __construct( $key, $field, $dom, $error, $repeater = false ) {
        $this->key      = $key;
        $this->field    = $field;
        $this->dom      = $dom;
        $this->error    = $error;
        $this->repeater = $repeater;
    }

    public function render() {

    }

    public function repeater_render() {

    }

    public static function Validate($key, $field, $ci, $options) {
        return [
            'error' => false,
            'errors' => [],
            'value' => $ci->input->post('key-' . $key)
        ];
    }

    public static function AfterLoad( $value, $key, $field, $options, $ci ) {
        return $value;
    }

    public static function BeforeSave( $value, $key, $field, $options, $ci ) {
        return $value;
    }
}