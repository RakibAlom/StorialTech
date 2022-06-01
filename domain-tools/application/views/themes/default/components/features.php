<?php if(count($this->options->get('homepage-features'))) { ?>

<div class="mainPadding homepageColumnsArea">
    <div class="row">
        <?php foreach($this->options->get('homepage-features') as $feature) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="homepageColumnsMain">
                    <div class="homepageColumnsIcon"><img src="<?php echo base_url($feature['image']) ?>"></div>
                    <h2><?php echo $feature['name'] ?></h2>
                    <p><?php echo html_entity_decode($feature['description']) ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php } ?>