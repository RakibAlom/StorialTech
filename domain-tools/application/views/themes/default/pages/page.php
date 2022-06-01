<?php $this->theme->view('includes/header'); ?>

<?php $this->load->view('core/header_ad_spot'); ?>

<div class="mainPadding homepageFaqsAreaMain">
    <div class="homepageFaqsArea">
        <h1><?php echo $page['title'] ?></h1>
        
        <?php echo $page['body']; ?>
    </div>
</div>

<?php $this->theme->view('includes/footer'); ?>