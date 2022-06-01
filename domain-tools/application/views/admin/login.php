<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title><?php echo $title ?> — <?php echo PRODUCT_NAME ?> Administration</title>

	<link href="<?php echo admin_dir_url('assets/css/app.css') ?>" rel="stylesheet">
	<link href="<?php echo admin_dir_url('assets/css/additional.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<?php if( isset( $page_styles ) ) {
		foreach( $page_styles as $style ) { ?>
			<link href="<?php echo $style; ?>" rel="stylesheet">
		<?php }
	} ?>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4 mb-4">
                            <img src="<?php echo admin_dir_url( 'assets/img/logo.png' ) ?>" width="175" class="pb-4" />

                            <h1 class="h2">Administration Panel</h1>
                            <p class="lead">
                                <?php echo PRODUCT_NAME ?>
                                <span class="badge badge-sm bg-success"><?php echo number_format( PRODUCT_VERSION, 1 ) ?></span>
                            </p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
                                    <?php $this->load->admin_view('widgets/alert'); ?>

									<form method="POST">
										<div class="mb-3">
											<label class="form-label <?php echo_if( 'text-danger', form_error('identifier') ) ?>">Username / E-Mail</label>
											<input class="form-control form-control-lg <?php echo_if( 'is-invalid', form_error('identifier') ) ?>" type="text" name="identifier" placeholder="Enter your Username or E-Mail" value="<?php set_value( 'identifier' ) ?>" />
                                            
                                            <?php echo form_error( 'identifier', '<small class="text-danger">', '</small>' ) ?>
                                        </div>
										<div class="mb-3">
											<label class="form-label <?php echo_if( 'text-danger', form_error('password') ) ?>">Password</label>
											<input class="form-control form-control-lg <?php echo_if( 'is-invalid', form_error('password') ) ?>" type="password" name="password" placeholder="Enter your Password" />
										
                                            <?php echo form_error( 'password', '<small class="text-danger">', '</small>' ) ?>
                                        </div>
										
										<?php if($this->options->get('recaptcha-status')) { ?>
											<div class="mb-3">
												<div class="g-recaptcha" data-sitekey="<?php echo $this->options->get('recaptcha-site-key') ?>"></div> 
											</div>
										<?php } ?>
										
										<div>
											<label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me">
                                                <span class="form-check-label">
                                                    Stay Logged In
                                                </span>
                                            </label>
										</div>

										<div class="text-center mt-3">
                                            <input type="hidden" name="auth-type" value="login" />
											<div class="row">
												<div class="col-3">
													<a class="btn btn-lg btn-danger d-block w-100" href="<?php echo admin_base_url('auth/reset') ?>">Reset</a>
												</div>
												<div class="col-9">
													<button type="submit" class="btn btn-lg btn-success d-block w-100">Sign In</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

    <script src="<?php echo admin_dir_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo admin_dir_url('assets/js/feather.min.js') ?>"></script>
    <script src="<?php echo admin_dir_url('assets/js/app.js') ?>"></script>

	<?php if($this->options->get('recaptcha-status')) { ?>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<?php } ?>
	
	<?php if( isset( $page_scripts ) ) {
		foreach( $page_scripts as $script ) { ?>
			<script src="<?php echo $script; ?>"></script>
		<?php }
	} ?>

</body>

</html>