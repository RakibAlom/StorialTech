<?php

$additional_css = $this->options->get('additional-css');
$additional_js  = $this->options->get('additional-js');
$custom_css     = $this->options->get('custom-css');
$analytics_id   = $this->options->get('google-analytics-id');

if(isset($styles)) {
    foreach($styles as $href) { ?>
        <link rel="stylesheet" href="<?php echo $href ?>" />
    <?php }
}

if( count( $additional_css ) ) {
    foreach($additional_css as $stylesheet) {
        if( $stylesheet['status'] ) { ?>
            <link rel="stylesheet" href="<?php echo $stylesheet['href'] ?>" />
        <?php }
    }
}

?>
<script>
    window.bitflan_baseUrl = '<?php echo base_url() ?>';
</script>
<?php

if( count( $additional_js ) ) {
    foreach($additionaadditional_js as $additional_js) {
        if( $stylesheet['status'] && $stylesheet['position'] == 'header' ) { ?>
            <script src="<?php echo $stylesheet['src'] ?>"></script>
        <?php }
    }
}

if( $analytics_id ) { ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo trim($analytics_id); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo trim($analytics_id); ?>');
</script>
<?php }

if( $custom_css ) { ?>
<style>
    <?php echo $custom_css; ?>
</style>
<?php }

$this->load->view('core/pop_ad');

if($this->options->get('custom-tags')) {
    echo $this->options->get('custom-tags');
}