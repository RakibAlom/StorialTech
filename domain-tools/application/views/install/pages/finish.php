<?php
$this->load->view("install/includes/header");
?>
	<div class="installer-container">
		<?php $this->load->view('install/includes/top'); ?>

		<div class="text-center">
		<?php if(validation_errors()) { ?>
			<div class="alert alert-danger">There were some errors in your form.</div>
			<?php } else { ?>
			<div class="alert alert-success">You're almost done! Confirm your website's URL and Cookie Domain.</div>
			<?php } ?>
			</div>
		<div class="tabs-area">
			<?php
			$this->load->view("install/includes/tabs");
			?>
			<form method="post">
			<div class="tabs-content">

                <div class="alert alert-info">
                    <span>You usually don't need to change these settings. They're automatically generated for you.</span>
                </div>

				<label class="label-tabs">Base URL</label>
				<span class="float-right">The Full URL of your website</span>
				<div class="text-fld-div">
					<input type="text" name="base_url" placeholder="http://yourwebsite.com/" value="<?php echo set_value('base_url', $base_url) ?>" class="form-control text-fld"/>
					<?php echo form_error('base_url', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
				<label class="label-tabs">Cookie Domain</label>
				<span class="float-right">Period followed by your domain name. <strong>Leave empty on localhost</strong></span>
				<div class="text-fld-div">
					<input type="text" name="cookie_domain" placeholder="" value="<?php echo set_value('cookie_domain', $cookie_domain) ?>" class="form-control text-fld"/>
					<?php echo form_error('cookie_domain', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>

				<div class="text-right tab-button-area">
                    <input type="hidden" name="submit" value="submit">
                    <button class="btn btn-tabs btn-submit" type="submit">Finish Installation</button>
				</div>
			</div>
			</form>
		</div>
		</div>
<?php
$this->load->view("install/includes/footer");
?>