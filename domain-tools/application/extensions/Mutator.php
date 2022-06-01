<?php defined('BASEPATH') || exit('Access Denied.');

class Mutator {
    private $config;

    public function __construct( $config ) {
        $this->config = $config;
    }

    public function perform_mutations() {

        return $this->config;
    }
}