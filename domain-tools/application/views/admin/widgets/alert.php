<?php
    if( !isset( $alert ) ) {
        $alert = $this->session->flashdata( 'alert' );
    }
?>

<?php if( is_array( $alert ) && $alert['message'] && $alert['type'] ) { ?>
    <div class="mt-3 alert alert-<?php echo $alert['type'] == 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <?php echo $alert['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>