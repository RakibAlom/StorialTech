<?php
$this->load->view("install/includes/header");
?>
	<div class="installer-container">
		<?php $this->load->view('install/includes/top'); ?>

		<div class="text-center">
		<?php if(validation_errors()) { ?>
			<div class="alert alert-danger">There were some errors in your form.</div>
			<?php } else if($error) { ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
            <?php } else { ?>
			<div class="alert alert-success">Verify your License.</div>
			<?php } ?>
			</div>
		<div class="tabs-area">
			<?php
			$this->load->view("install/includes/tabs");
			?>
			<form method="post">
			<div class="tabs-content">
				<?php if(!in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1', 'localhost'])) { ?>
					<div class="alert alert-success">
						<span><strong>Note:</strong> Before you can verify your license. You must attach your purchase code to this domain. <a href="<?php echo ACTIVATE_URL ?>" target="_blank">Click Here</a> to attach your license to a domain.</span>
					</div>
				<?php } ?>
                <div class="alert alert-info">
                    <span>You can get your purchase code from the downloads page. <a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-">Click Here</a> to find out how.</span>
                </div>

				<label class="label-tabs">Purchase Code</label>
				<div class="text-fld-div">
					<input type="text" name="purchase_code" placeholder="Enter the Purchase Code from Envato" value="<?php echo set_value('purchase_code') ?>" class="form-control text-fld"/>
					<?php echo form_error('purchase_code', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>

				<div class="text-right tab-button-area">
                    <input type="hidden" name="submit" value="submit">
                    <button class="btn btn-tabs btn-submit" type="submit">Verify License</button>
				</div>
			</div>
			</form>
		</div>
		</div>
<?php
$this->load->view("install/includes/footer");
?>