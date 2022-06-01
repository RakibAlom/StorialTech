<?php
$this->load->view("install/includes/header");
?>
	<div class="installer-container">
		<?php $this->load->view('install/includes/top'); ?>

		<div class="text-center">
		<?php if($error) { ?>
			<div class="alert alert-danger">Could not connect to that database.</div>
		<?php } 
			else if(validation_errors()) { ?>
			<div class="alert alert-danger">There were some errors in your form.</div>
			<?php } else { ?>
			<div class="alert alert-info">Enter Database Details Below & Click Verify</div>
			<?php } ?>
			</div>
		<div class="tabs-area">
			<?php
			$this->load->view("install/includes/tabs");
			?>
			<form method="post">
			<div class="tabs-content">
				<label class="label-tabs">Database Host</label>
				<div class="text-fld-div">
					<input type="text" name="host" placeholder="e.g: localhost" value="<?php echo set_value('host', 'localhost') ?>" class="form-control text-fld"/>
					<?php echo form_error('host', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
				<label class="label-tabs">Database Name</label>
				<div class="text-fld-div">
					<input type="text" name="database" placeholder="Database Name" value="<?php echo set_value('database') ?>" class="form-control text-fld"/>
					<?php echo form_error('database', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
				<label class="label-tabs">Database Username</label>
				<div class="text-fld-div">
					<input type="text" name="username" placeholder="Database Username" value="<?php echo set_value('username') ?>" class="form-control text-fld"/>
					<?php echo form_error('username', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
				<label class="label-tabs">Database Password</label>
				<div class="text-fld-div">
					<input type="password" name="password" placeholder="Database Password" class="form-control text-fld"/>
					<?php echo form_error('username', '<div class="m-t-5 text-danger"><small>', '</small></div>'); ?>
				</div>
				<div class="tab-button-area text-right">
				<?php if(isset($error) && !$error && isset($msg)) { ?>
				<a class="btn btn-tabs" href="<?php echo($base_url."install/".$next_page); ?>">Next</a>
				<?php } else { ?>
				<input type="hidden" name="submit" value="submit">
				<button class="btn btn-tabs btn-submit" type="submit">Verify</button>
				<?php } ?>
				</div>
			</div>
			</form>
		</div>
		</div>
<?php
$this->load->view("install/includes/footer");
?>