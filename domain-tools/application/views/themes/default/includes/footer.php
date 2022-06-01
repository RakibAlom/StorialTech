		<?php $this->load->view('core/footer_ad_spot'); ?>
		
		<footer>
			<div class="footer-inner">
				<div class="mainPadding">
					<div class="navigationSection">
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-4">
										<h2><?php echo lang('tools_heading') ?></h2>
										<ul>
											<li><a href="<?php echo base_url() ?>"><?php echo lang('domain_search_name') ?></a></li>
											<li><a href="<?php echo base_url('domain_generator') ?>"><?php echo lang('domain_generator_name') ?></a></li>
											<li><a href="<?php echo base_url('whois') ?>"><?php echo lang('domain_whois_name') ?></a></li>
											<li><a href="<?php echo base_url('ip_lookup') ?>"><?php echo lang('ip_lookup_name') ?></a></li>
											<li><a href="<?php echo base_url('location') ?>"><?php echo lang('domain_location_name') ?></a></li>
											<li><a href="<?php echo base_url('dns_lookup') ?>"><?php echo lang('dns_lookup_name') ?></a></li>
										</ul>
									</div>
									<div class="col-lg-4">
										<h2><?php echo lang('pages_heading') ?></h2>
										<ul>
											<li><a href="<?php echo base_url() ?>"><?php echo lang('home_page_name') ?></a></li>
											<?php
												if(count($pages)) {
													foreach($pages as $page) { if($page['status'] && in_array($page['placement'], [ 'both', 'footer' ])) { ?>
														<li><a href="<?php echo base_url('page/' . $page['permalink']) ?>"><?php echo $page['title'] ?></a></li>
													<?php } }
												}
											?>
											<?php if( $this->options->get('contact-page-status') ) { ?>
												<li><a href="<?php echo base_url('contact') ?>"><?php echo lang('contact_page_name') ?></a></li>
											<?php } ?>
										</ul>
									</div>

									<?php if(count($this->options->get('hf-links'))) {
										ob_start();
										foreach($this->options->get('hf-links') as $page) { if(in_array($page['placement'], [ 'both', 'footer' ])) { ?>
											<li><a <?php echo_if('target="_blank"', $page['new-tab']) ?> href="<?php echo $page['href'] ?>"><?php echo $page['title'] ?></a></li>
										<?php } }

										$text = ob_get_clean();

										if($text) { ?>
											<div class="col-lg-4">
												<h2><?php echo lang('links_heading') ?></h2>
												<ul>
													<?php echo $text ?>
												</ul>
											</div>
										<?php } } ?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="footerLogo"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url( $this->options->get('logo') ) ?>"></a></div>
								<div class="footerCopyright">
                                    <?php echo $this->options->get('footer-attribution') ?>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
	</div>
	<script src="<?php echo $this->theme->url('assets/js/vjax.min.js'); ?>"></script>
	<script src="<?php echo $this->theme->url('assets/js/alpine.min.js'); ?>" defer></script>
	
    <?php $this->load->view('core/footer_content'); ?>
</body>
</html>