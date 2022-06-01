<?php

$additional_js = $this->options->get('additional-js');

if(isset($scripts)) {
    foreach($scripts as $src) { ?>
        <script src="<?php echo is_array($src) ? $src[0] : $src ?>" <?php echo is_array($src) ? $src[1] : '' ?>></script>
    <?php }
}

if( count( $additional_js ) ) {
    foreach($additionaadditional_js as $additional_js) {
        if( $stylesheet['status'] && $stylesheet['position'] == 'footer' ) { ?>
            <script src="<?php echo $stylesheet['src'] ?>"></script>
        <?php }
    }
}