<?php
    if( $this->options->get('middle-ad-status') ) { ?>
        <div class="text-center middle-ad">
            <?php echo $this->options->get('middle-ad-code'); ?>
        </div>
    <?php }