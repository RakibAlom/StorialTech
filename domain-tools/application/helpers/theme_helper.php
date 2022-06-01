<?php defined('BASEPATH') || exit('Access Denied.');

if( !function_exists( 'current_theme' ) ) {
    function current_theme() {
        return isset( $GLOBALS['theme'] ) ? $GLOBALS['theme'] : null;
    }
}