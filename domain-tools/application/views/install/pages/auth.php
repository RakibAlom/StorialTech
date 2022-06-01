<?php
$this->load->view("install/includes/header");
?>
	<div class="installer-container">
		<?php $this->load->view('install/includes/top'); ?>

		<div class="text-center">
		<?php if(validation_errors()) { ?>
			<div class="alert alert-danger">There were some errors in your form.</div>
			<?php } else { ?>
			<div class="alert alert-info">Create Admin Account</div>
			<?php } ?>
			</div>
		<div class="tabs-area">
			<?php
			$this->load->view("install/includes/tabs");
			?>
			<form method="post">
			<div class="tabs-content">

                <div class="alert alert-success">
                    <span>Specify the Login Credentials of the Administrator.</span>
                </div>

				<label class="label-tabs">Username</label>
				<div class="text-fld-div">
					<input type="text" name="username" placeholder="Your Username" value="<?php echo set_value('username') ?>" class="form-control text-fld"/>
					<?php echo form_error('username', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
				<label class="label-tabs">E-Mail Address</label>
				<div class="text-fld-div">
					<input type="text" name="email" placeholder="Your E-Mail Address" value="<?php echo set_value('email') ?>" class="form-control text-fld"/>
					<?php echo form_error('email', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
                <div class="row">
                    <div class="col-6">
                        <label class="label-tabs">Password</label>
                        <div class="text-fld-div">
                            <input type="password" name="password" placeholder="Your Password" class="form-control text-fld"/>
                            <?php echo form_error('password', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="label-tabs">Password Confirmation</label>
                        <div class="text-fld-div">
                            <input type="password" name="password_conf" placeholder="Confirm Your Password" class="form-control text-fld"/>
                            <?php echo form_error('password_conf', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
                        </div>
                    </div>
                </div>

				<div class="text-right tab-button-area">
                    <input type="hidden" name="submit" value="submit">
                    <button class="btn btn-tabs btn-submit" type="submit">Create Admin Account</button>
				</div>
			</div>
			</form>
		</div>
		</div>
<?php
$this->load->view("install/includes/footer");
?>