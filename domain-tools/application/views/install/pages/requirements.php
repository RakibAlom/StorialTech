<?php
$this->load->view("install/includes/header");
?>
	<div class="installer-container">
		<?php $this->load->view('install/includes/top'); ?>
		
		<?php if(!$status) { ?>
		<div class="text-center">
			<div class="alert alert-danger">Please Make Sure Your Server Meets All Requirements. Refresh to see Changes</div>
		</div>
		<?php } ?>
		<!-- /thankyou-area -->
		<div class="tabs-area">
			<?php
			$this->load->view("install/includes/tabs");
			?>
			<!-- /tabs-nav -->
			
			<div class="pb-2">
				<span>Legend:</span>
				<span class="badge badge-success">Found</span>
				<span class="badge badge-danger">Not Found</span>
				<span class="badge badge-info">Optional</span>
			</div>

			<div class="tabs-content">
				<div class="tab-requirements <?php echo_if('bg-info text-white', $requirements['web-server'] === 'optional'); ?> <?php echo ($requirements['web-server'] === true) ? '' : 'inactive' ?>"><span class="font-weight-bold">Apache Web Server</span></div>
				<div class="tab-requirements <?php echo_if('bg-info text-white', $requirements['php-version'] === 'optional'); ?> <?php echo ($requirements['php-version'] === true) ? '' : 'inactive' ?>"><span class="font-weight-bold">PHP 7.0 or Higher</span></div>
				<div class="tab-requirements <?php echo_if('bg-info text-white', $requirements['mysql-version'] === 'optional'); ?> <?php echo ($requirements['mysql-version'] === true) ? '' : 'inactive' ?>"><span class="font-weight-bold">MySQLi Drivers for PHP</span></div>
				<div class="tab-requirements <?php echo_if('bg-info text-white', $requirements['curl'] === 'optional'); ?>  <?php echo ($requirements['curl'] === true) ? '' : 'inactive' ?>"><span class="font-weight-bold">PHP cURL Extension</span></div>
				<div class="tab-requirements <?php echo_if('bg-info text-white', $requirements['fsockopen'] === 'optional'); ?> <?php echo ($requirements['fsockopen'] === true) ? '' : 'inactive' ?>"><span class="font-weight-bold">PHP "fsockopen" Available</span></div>
				<div class="tab-requirements <?php echo_if('bg-info text-white', $requirements['zip'] === 'optional'); ?> <?php echo ($requirements['zip'] === true) ? '' : 'inactive' ?>"><span class="font-weight-bold">PHP ZIP Extension (Used for Quick Updates)</span></div>
				<div class="tab-button-area text-right">
				<?php if(!$status) { ?>
				    <a class="btn btn-tabs" href="<?php echo($base_url."install/".$current_page); ?>">Refresh</a> <?php 
                } else { ?>
				    <a class="btn btn-tabs" href="<?php echo($base_url."install/".$next_page); ?>">Next</a>
				<?php } ?>
                
				</div>
			</div>
		</div>
<?php
$this->load->view("install/includes/footer");
?>