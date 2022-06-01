<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo isset($title) ? $title : lang('home_page_name') ?> — <?php echo $this->options->get('website-title') ?></title>

		<link rel="icon" href="<?php echo base_url( $this->options->get('favicon') ) ?>" />
		<link rel="stylesheet" href="<?php echo $this->theme->url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo $this->theme->url('assets/css/all.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo $this->theme->url('assets/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php echo $this->theme->url('assets/css/additional.css'); ?>">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
		
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8183914844375779" crossorigin="anonymous"></script>

		<?php $this->load->view('core/header_content') ?>
	</head>
<body>
	<div class="mainSection">
		<header class="mainPadding">
				<nav x-data="{ showMenu: false }" class="p-0 navbar navbar-expand-lg navbar-dark">
					<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url( $this->options->get('logo') ) ?>" class="img-responsivee"></a>
					
					<button x-on:click="showMenu = !showMenu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse navbarMob" x-bind:class="{ 'show': showMenu }" id="navbarNav">
						<ul class="navbar-nav headerNavigation">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url() ?>"><?php echo lang('home_page_name') ?></a>
							</li>

							<?php
								if(count($pages)) {
									foreach($pages as $page) { if($page['status'] && in_array($page['placement'], [ 'both', 'header' ])) { ?>
										<li class="nav-item">
											<a class="nav-link" href="<?php echo base_url('page/' . $page['permalink']) ?>"><?php echo $page['title'] ?>
										</li>
									<?php } }
								}
							?>

							<?php if(count($this->options->get('hf-links'))) { ?>
								<?php
									foreach($this->options->get('hf-links') as $page) { if(in_array($page['placement'], [ 'both', 'header' ])) { ?>
										<li class="nav-item">
											<a class="nav-link" <?php echo_if('target="_blank"', $page['new-tab']) ?> href="<?php echo $page['href'] ?>"><?php echo $page['title'] ?></a>
										</li>
									<?php } }
								?>
							<?php } ?>

							<?php if( $this->options->get('contact-page-status') ) { ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('contact') ?>"><?php echo lang('contact_page_name') ?></a>
								</li>
							<?php } ?>

							<?php if($this->CurrencyModel->api && $this->options->get('enable-currency-selection')) { ?>
								<li class="nav-item">
									<select @change="let req = new vjaxClass(); req.get( { url: window.bitflan_baseUrl + 'currency', data: { symbol: $el.value }, onResponse: function(data) { if(data.text == 'error') { alert('There was an error setting your currency.'); } } } );" x-data id="currency" name="currency" class="form-control">
										<?php
											$data     = $this->CurrencyModel->get();
											$selected = $this->CurrencyModel->currency;
											foreach ($data as $symbol => $meta) { if($meta['enabled'] || $meta['default']) { ?>
												<option <?php if($symbol == $selected) { echo 'selected'; } ?> value="<?php echo $symbol ?>"><?php echo $symbol ?></option>
											<?php } }
										?>
									</select>
								</li>
							<?php } ?>
						</ul>
					</div>
				</nav>
		</header>