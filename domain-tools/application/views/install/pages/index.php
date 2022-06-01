<?php
$this->load->view("install/includes/header");
?>
	<div class="installer-container">
		<?php $this->load->view('install/includes/top'); ?>
		
		<div class="thankyou-area text-center">
			<div class="thankyou-title">Thanks for Purchasing our Product</div>
			<div class="thankyou-w-installation alert alert-success text-dark">This wizard will help you install <?php echo(PRODUCT_NAME); ?> <span class="badge badge-success">v<?php echo(number_format(PRODUCT_VERSION, 1)); ?></span></div>
		</div>
		
		<div class="tabs-area">
			<?php
			    $this->load->view("install/includes/tabs");
			?>			
			<div class="tabs-content">
			<div class="thankyou-w-installation">Click Next to Continue.</div>
			<div class="thankyou-w-support">If you face any problem while installation then open the support ticket <a href="<?php echo(SUPPORT_URL); ?>" target="_blank">here</a>.</div>
				<div class="tab-button-area text-right"><a class="btn btn-tabs" href="<?php echo($base_url."install/".$next_page); ?>">Next</a></div>
			</div>
		</div>
<?php
$this->load->view("install/includes/footer");
?>