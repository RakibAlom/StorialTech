<?php
    if( $this->options->get('footer-ad-status') ) { ?>
        <div class="text-center footer-ad">
            <?php echo $this->options->get('footer-ad-code'); ?>
        </div>
    <?php }