<div class="container-fluid p-0">
    <h1 class="h3">
        <span class="ml-2">Theme Options</span>
    </h1>
    <span class="mb-3">Change the theme of your website.</span>

    <?php
        if( $alert != 'blank' ) {
            $this->load->admin_view('widgets/alert', [
                'alert' => [
                    'type'    => $alert == 'success' ? 'success' : 'error',
                    'message' => $alert == 'success' ? 'Theme updated successfully!' : 'There was an error changing the theme.' 
                ]
            ]);
        }
    ?>

    <div class="row">
    <?php foreach( $list as $theme ) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card mt-3 theme-card">
                <div class="card-header">
                    <div>
                        <span><?php echo $theme['name'] ?></span>
                        
                        <a href="<?php echo $theme['author']['url']; ?>" target="_blank" class="badge bg-primary float-end text-light text-decoration-none">
                            by <?php echo $theme['author']['name']; ?>
                        </a>

                        <?php if($current_theme == $theme['theme-dir']) { ?>
                            <span class="badge bg-success float-end text-light mx-1">
                                Active
                            </span>
                        <?php } ?>
                    </div>
                    <small class="text-muted">v<?php echo number_format($theme['version'], 1) ?></small>
                    
                </div>
                <div class="card-body">
                    <img class="img-fluid shadow-lg" src="<?php echo $theme['preview'] ?>" /> 
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-sm btn-success <?php if( $current_theme == $theme['theme-dir'] ) { echo 'disabled'; } ?>" href="<?php echo admin_base_url( 'options/themes/' . $theme['theme-dir'] ); ?>">
                            <i data-feather="check"></i> Activate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>