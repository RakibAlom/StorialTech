<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?php echo base_url( $this->options->get('favicon') ) ?>" />
	<title><?php echo $title ?> — <?php echo PRODUCT_NAME ?> Administration</title>

	<link href="<?php echo admin_dir_url('assets/css/app.css') ?>" rel="stylesheet">
	<link href="<?php echo admin_dir_url('assets/css/additional.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<?php if( isset( $page_styles ) ) {
		foreach( $page_styles as $style ) { ?>
			<link href="<?php echo $style; ?>" rel="stylesheet">
		<?php }
	} ?>

	<script>
		const admin_base_url = "<?php echo admin_base_url(); ?>";
	</script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="<?php echo base_url() ?>">
                    <span class="align-middle">
						<img width="125" src="<?php echo admin_dir_url('assets/img/logo-white.png') ?>" alt="Logo" />
					</span>
                </a>
				
				<?php 
					$controller  = $this->uri->segment(2);
					$page        = $this->uri->segment(3);
				?>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Administration
					</li>

					<li class="sidebar-item <?php echo_if( 'active', (!$controller || $controller == 'dashboard') ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('dashboard'); ?>">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>

					<li class="sidebar-header">
						Options
					</li>

					<?php foreach($this->options->get_sidebar() as $id => $item) { ?>
						<li class="sidebar-item <?php echo_if( 'active', $page == $id ); ?>">
							<a class="sidebar-link" href="<?php echo $item['url'] ?>">
								<i class="align-middle" data-feather="<?php echo $item['icon'] ?>"></i> <span class="align-middle"><?php echo $item['name'] ?></span>
							</a>
						</li>
					<?php } ?>

					<li class="sidebar-item <?php echo_if( 'active', $controller == 'tlds' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('tlds') ?>">
							<i class="align-middle" data-feather="link-2"></i> <span class="align-middle">TLD List</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo_if( 'active', $controller == 'pages' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('pages') ?>">
							<i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Pages</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo_if( 'active', $page == 'themes' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('options/themes') ?>">
							<i class="align-middle" data-feather="droplet"></i> <span class="align-middle">Themes</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo_if( 'active', $controller == 'update' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('update') ?>">
							<i class="align-middle" data-feather="arrow-up"></i> <span class="align-middle">Update</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?php echo admin_base_url('dashboard/generate_sitemap') ?>">
							<i class="align-middle" data-feather="code"></i> <span class="align-middle">Generate Sitemap</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?php echo admin_base_url('dashboard/cache_clean') ?>">
							<i class="align-middle" data-feather="trash"></i> <span class="align-middle">Destroy Cache</span>
						</a>
					</li>

					<li class="sidebar-header">
						Authentication
					</li>

					<li class="sidebar-item <?php echo_if( 'active', $controller == 'auth' && $page == 'settings' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('auth/settings') ?>">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Account Settings</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo_if( 'active', $controller == 'auth' && $page == 'create' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('auth/create') ?>">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create Account</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo_if( 'active', $controller == 'auth' && $page == 'list' ); ?>">
						<a class="sidebar-link" href="<?php echo admin_base_url('auth/list') ?>">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">All Accounts</span>
						</a>
					</li>

				</ul>
				<div class="sidebar-brand">
					<div class="product-info d-flex justify-space-between">
						<span class="badge"><?php echo PRODUCT_NAME; ?></span>
						<span class="badge text-success"><?php echo number_format(PRODUCT_VERSION, 1) ?></span>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a id="sidebar-collapse" class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<?php if( defined('DEMO_MODE') && DEMO_MODE ) { ?>
							<li class="nav-item">
								<div style="padding: 6px 15px; margin: 0;" class="alert alert-danger">
									<span>Certain Features are disabled in Demo Mode.</span>
								</div>
							</li>
						<?php } ?>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<?php if($update) { ?>
										<span class="indicator">1</span>
									<?php } ?>
								</div>
							</a>
							<div class="py-0 dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="alertsDropdown">
								<?php if($update) { ?>
									<div class="dropdown-menu-header">
										1 New Notification
									</div>
									<div class="list-group">
										<a href="<?php echo admin_base_url('update') ?>" class="list-group-item">
											<div class="row g-0 align-items-center">
												<div class="col-2">
													<i class="text-success" data-feather="alert-circle"></i>
												</div>
												<div class="col-10">
													<div class="text-dark">Update Ready</div>
													<div class="mt-1 text-muted small">Updates usually include bug fixes & new features.</div>
												</div>
											</div>
										</a>
									</div>
								<?php } else { ?>
									<div class="dropdown-menu-header">
										No New Notifications
									</div>
								<?php }?>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark"><?php echo $admin_user['username']; ?></span>
                            </a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?php echo admin_base_url() ?>"><i class="align-middle me-1" data-feather="pie-chart"></i> Dashboard</a>
								<a class="dropdown-item" href="<?php echo admin_base_url( 'auth/settings' ) ?>"><i class="align-middle me-1" data-feather="settings"></i> Settings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url(); ?>" target="_blank"><i class="align-middle me-1" data-feather="external-link"></i> Visit Website</a>
								<a class="dropdown-item" href="<?php echo SUPPORT_URL ?>" target="_blank"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo admin_base_url('auth/logout') ?>">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				{{content}}
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="<?php echo VENDOR_URL ?>" target="_blank"><strong><?php echo VENDOR_NAME ?></strong></a> &copy; <?php echo date('Y') ?>
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="<?php echo SUPPORT_URL ?>" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="<?php echo MORE_PRODUCTS_URL ?>" target="_blank">More Awesome Products</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <script defer src="<?php echo admin_dir_url('assets/js/alpine.min.js') ?>"></script>
    <script src="<?php echo admin_dir_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo admin_dir_url('assets/js/feather.min.js') ?>"></script>
    <script src="<?php echo admin_dir_url('assets/js/app.js') ?>"></script>

	<?php if( isset( $page_scripts ) ) {
		foreach( $page_scripts as $script ) { ?>
			<script src="<?php echo $script; ?>"></script>
		<?php }
	} ?>
</body>

</html>