<?php $this->theme->view('includes/header'); ?>

<div class="mainPadding homepageFaqsAreaMain pt-0">
    <div class="homepageFaqsArea">
        <h1><?php echo lang('contact_heading') ?></h1>
        <div class="homeFaqsRow text-center">
            <h4><?php echo lang('contact_subheading') ?></h4>
            <p><?php echo lang('contact_subtitle') ?></p>
        </div>
        <div class="contactDivider"></div>
        <div class="row">
            <div class="col-lg-6"><div class="contactImage"><img src="<?php echo base_url( $this->options->get('contact-page-image') ) ?>" class="img-responsivee"></div></div>
            <div class="col-lg-5">
                <form method="POST">
                    <?php 

                    if($error) { ?>
                        <div class="alert alert-danger">
                            <span><?php echo $error ?></span>
                        </div>
                    <?php }
                    
                    if($success = $this->session->flashdata('success')) { ?>
                        <div class="alert alert-success">
                            <span><?php echo $success ?></span>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_name_label') ?> <span class="text-danger">*</span></label>
                        <input name="name" type="text" class="border <?php if(form_error('name')) { echo 'border-danger'; } ?> form-control contactInputs" placeholder="<?php echo lang('contact_name_placeholder') ?>" value="<?php echo set_value('name') ?>">
                        <?php echo form_error('name'); ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_email_label') ?> <span class="text-danger">*</span></label>
                        <input name="email" type="email" class="border <?php if(form_error('email')) { echo 'border-danger'; } ?> form-control contactInputs" placeholder="<?php echo lang('contact_email_placeholder') ?>" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email'); ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('contact_message_label') ?> <span class="text-danger">*</span></label>
                        <textarea name="message" class="border <?php if(form_error('message')) { echo 'border-danger'; } ?> form-control contactTextarea" rows="4" placeholder="<?php echo lang('contact_message_placeholder') ?>"><?php echo set_value('message') ?></textarea>
                        <?php echo form_error('message'); ?>
                    </div>
                    
                    <?php if($this->options->get('recaptcha-status')) { ?>
                        <div class="g-recaptcha" data-sitekey="<?php echo $this->options->get('recaptcha-site-key') ?>"></div>
                    <?php } ?>

                    <input type="hidden" name="submit" value="true" />
                    <button class="btn contactButton" type="submit"><div class="blockGrad"></div><span><?php echo lang('contact_submit_label') ?></span></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->theme->view('includes/footer'); ?>