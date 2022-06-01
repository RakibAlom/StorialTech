<?php
    if( $this->options->get('header-ad-status') ) { ?>
        <div class="text-center header-ad">
            <?php echo $this->options->get('header-ad-code'); ?>
        </div>
    <?php }