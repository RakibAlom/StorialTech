<div class="container-fluid p-0">
    <h1 class="h3">
        <!-- <i class="align-middle" data-feather="<?php echo $this->options->current['icon'] ?>"></i> -->
        <span class="ml-2"><?php echo $this->options->current['title']; ?></span>
    </h1>
    <span class="mb-3"><?php echo $this->options->current['description'] ?></span>

    <?php
        if( $this->options->validation->status() != 'blank' ) {
            $this->load->admin_view('widgets/alert', [
                'alert' => [
                    'type'    => $this->options->validation->status() == 'success' ? 'success' : 'error',
                    'message' => $this->options->validation->status() == 'success' ? 'Settings updated successfully' : 'There were some errors in your form.' 
                ]
            ]);
        }
    ?>

    <div class="card mt-3">
        <div class="card-body">
            <?php $this->options->render_form(); ?>
        </div>
    </div>
</div>