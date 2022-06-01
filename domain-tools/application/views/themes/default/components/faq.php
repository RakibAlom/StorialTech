<?php if(count($this->options->get('homepage-faqs'))) { ?>

<div class="mainPadding homepageFaqsAreaMain">
    <div class="homepageFaqsArea">
        <h1><?php echo lang('faq_headings') ?></h1>
        <div class="row">
            <?php foreach($this->options->get('homepage-faqs') as $faq) { ?>
                <div class="col-lg-6">
                    <div class="homeFaqsRow">
                        <h4><?php echo $faq['title']; ?></h4>
                        <p><?php echo html_entity_decode($faq['description']); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php } ?>