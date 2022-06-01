<?php defined('BASEPATH') || exit('Access Denied.');

function admin_dir_url( $path = '' ) {
    return base_url( 'application/views/' . ADMIN_RESOURCE_PATH . '/' . $path );
}

function admin_base_url( $path = '' ) {
    return base_url( ADMIN_PATH_NAME . '/' . $path );
}

function admin_auth_url() {
    redirect( admin_base_url( 'auth?redirect=' . urlencode(current_url()) ) );
}