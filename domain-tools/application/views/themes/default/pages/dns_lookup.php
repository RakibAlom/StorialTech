<?php

$this->theme->view('includes/header');

$this->theme->view('components/tools'); 

?>

<section x-data="window.bitflan.components.dns_lookup_component()" x-init="init(<?php echo alpinify($js_errors) ?>)" @keyup.enter="submit()">
    <div class="searchSection mainPadding">
        <div class="searchInput">
            <input x-model="domain" type="text" placeholder="<?php echo lang('enter_domain_name') ?>" x-bind:class="error && 'border border-danger'" class="inputFiled form-control">
            <div x-show="domain.length" x-on:click="domain = ''" x-cloak class="searchCross">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.047" height="30.047" viewBox="0 0 30.047 30.047"><path d="M19.349,8.726H12.9a.379.379,0,0,1-.379-.379V1.9a1.9,1.9,0,0,0-3.794,0v6.45a.379.379,0,0,1-.379.379H1.9a1.9,1.9,0,0,0,0,3.794h6.45a.379.379,0,0,1,.379.379v6.45a1.9,1.9,0,0,0,3.794,0V12.9a.379.379,0,0,1,.379-.379h6.45a1.9,1.9,0,0,0,0-3.794Zm0,0" transform="translate(15.023) rotate(45)" fill="#b8b8b8"/></svg></div>
        </div>
        <button x-on:click="submit()" class="btn searchButton" type="submit" value="submit">
            <div class="blockGrad"></div>
            <span x-show="!sending"><?php echo lang('query_dns') ?></span>
            <span x-cloak x-show="sending"><img src="<?php echo $this->theme->url('assets/images/search_loader.svg') ?>" /></span>
        </button>
    </div>

    <template x-if="error_message.length">
        <div class="mt-3 mainPadding" x-transition >
            <div class="alert alert-danger" x-text="error_message"></div>
        </div>
    </template>

	<?php $this->load->view('core/header_ad_spot'); ?>

    <div class="result-content mainPadding" x-show="data.length" x-transition >
        <div class="result-content-inner">
			<div class="result-main-title clearfix">
				<div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 54.194 54.194"><g transform="translate(-1 -1)"><path d="M33.622,5H31v8.741h2.622a4.371,4.371,0,1,0,0-8.741Zm0,6.993h-.874V6.748h.874a2.622,2.622,0,1,1,0,5.245Z" transform="translate(-3.777 -0.504)"></path><path d="M53.622,6.748H55.37a.875.875,0,0,1,.874.874h1.748A2.625,2.625,0,0,0,55.37,5H53.622a2.622,2.622,0,0,0,0,5.245H55.37a.874.874,0,0,1,0,1.748H53.622a.875.875,0,0,1-.874-.874H51a2.626,2.626,0,0,0,2.622,2.622H55.37a2.622,2.622,0,0,0,0-5.245H53.622a.874.874,0,0,1,0-1.748Z" transform="translate(-6.295 -0.504)"></path><path d="M46.245,10.912,43.288,5H41v8.741h1.748V7.829L45.7,13.741h2.288V5H46.245Z" transform="translate(-5.036 -0.504)"></path><path d="M52.572,1H26.349a2.626,2.626,0,0,0-2.622,2.622V7.993H21.339l-.67,2.1a21.892,21.892,0,0,0-8.487,3.52L10.218,12.6,5.607,17.21l1.016,1.965A21.856,21.856,0,0,0,3.1,27.662l-2.1.67v6.523l2.1.669a21.877,21.877,0,0,0,3.519,8.487L5.607,45.976l4.611,4.612,1.965-1.017a21.879,21.879,0,0,0,8.487,3.52l.67,2.1h6.523l.67-2.1a21.892,21.892,0,0,0,8.487-3.52l1.965,1.017,4.611-4.612-1.016-1.965A21.856,21.856,0,0,0,46.1,35.525l2.1-.67V28.331l-2.1-.669a21.877,21.877,0,0,0-3.519-8.487l1.016-1.965-.478-.477h9.455a2.626,2.626,0,0,0,2.622-2.622V3.622A2.626,2.626,0,0,0,52.572,1ZM28.225,19.908c.215.653.413,1.341.587,2.071H20.376c.885-3.741,2.23-6.2,3.57-6.821a2.626,2.626,0,0,0,2.4,1.577h.874V18.12A2.1,2.1,0,0,0,28.225,19.908ZM33.1,17.335a16.618,16.618,0,0,1,5.034,4.644H30.6q-.223-.99-.49-1.9a2.1,2.1,0,0,0,.712-.465ZM9.98,23.727h8.279a46.635,46.635,0,0,0-.642,6.993H8.037A16.492,16.492,0,0,1,9.98,23.727Zm1.1-1.748a16.631,16.631,0,0,1,10.137-6.646A18.638,18.638,0,0,0,18.6,21.978Zm8.287,8.741a44.08,44.08,0,0,1,.648-6.993h9.159a43.951,43.951,0,0,1,.653,6.993ZM29.83,32.468a44.079,44.079,0,0,1-.648,6.993H20.019a44.08,44.08,0,0,1-.648-6.993Zm-12.214,0a46.75,46.75,0,0,0,.642,6.993H9.979a16.492,16.492,0,0,1-1.942-6.993Zm.985,8.741a18.638,18.638,0,0,0,2.621,6.646,16.631,16.631,0,0,1-10.137-6.646Zm1.776,0h8.448C27.8,45.56,26.144,48.2,24.6,48.2S21.406,45.56,20.377,41.209Zm10.223,0h7.516A16.631,16.631,0,0,1,27.98,47.854,18.638,18.638,0,0,0,30.6,41.209Zm8.621-1.748H30.943a46.635,46.635,0,0,0,.642-6.993h9.579A16.492,16.492,0,0,1,39.222,39.46Zm-7.643-8.741a46.054,46.054,0,0,0-.631-6.993h8.272a16.591,16.591,0,0,1,1.96,6.993Zm9.876-13.176-.922,1.783.318.437a20.1,20.1,0,0,1,3.61,8.706l.084.534,1.908.607v3.966l-1.908.607-.084.534a20.094,20.094,0,0,1-3.61,8.706l-.318.437.922,1.783-2.8,2.8-1.782-.922-.436.318a20.1,20.1,0,0,1-8.707,3.611l-.534.084-.607,1.908H22.618l-.607-1.907-.534-.084a20.1,20.1,0,0,1-8.707-3.611l-.436-.318-1.782.922-2.8-2.8.922-1.783-.318-.437a20.1,20.1,0,0,1-3.61-8.706l-.084-.534-1.909-.607V29.611L4.656,29l.084-.534a20.094,20.094,0,0,1,3.61-8.706l.318-.437-.922-1.783,2.8-2.8,1.782.922.436-.318a20.1,20.1,0,0,1,8.707-3.611l.534-.084.607-1.908h1.109v3.541a18.314,18.314,0,1,0,11.649,3.452h5.27Zm11.991-3.432a.875.875,0,0,1-.874.874H32.98l-3.392,3.391a.376.376,0,0,1-.617-.256V14.986H26.349a.875.875,0,0,1-.874-.874V3.622a.875.875,0,0,1,.874-.874H52.572a.875.875,0,0,1,.874.874Z"></path><path d="M51,49h8.741v1.748H51Z" transform="translate(-6.295 -6.043)"></path><path d="M51,53h8.741v1.748H51Z" transform="translate(-6.295 -6.547)"></path><path d="M55,57h1.748v1.748H55Z" transform="translate(-6.799 -7.05)"></path><path d="M51,57h1.748v1.748H51Z" transform="translate(-6.295 -7.05)"></path><path d="M59,57h1.748v1.748H59Z" transform="translate(-7.302 -7.05)"></path><path d="M3,3h8.741V4.748H3Z" transform="translate(-0.252 -0.252)"></path><path d="M3,7h8.741V8.748H3Z" transform="translate(-0.252 -0.755)"></path><path d="M3,11H4.748v1.748H3Z" transform="translate(-0.252 -1.259)"></path><path d="M11,11h1.748v1.748H11Z" transform="translate(-1.259 -1.259)"></path><path d="M7,11H8.748v1.748H7Z" transform="translate(-0.755 -1.259)"></path></g></svg></span>Domain DNS</div>
			</div>
            <div class="extension-area">
                <div class="domainDnsSection">
                        <template x-for="entry in data" :key="entry.type">
                            <div>
                                <template x-if="entry.data.length">
                                    <div>
                                        <h4 x-text="entry.type"></h4>
										<div class="dnsBlock">
											<div class="table-responsive">
												<table class="table table-striped">
													<tbody>
														<tr>
															<th>HOST</th>
															<th>CLASS</th>
															<th>TTL</th>
															<th>IP</th>
														</tr>
														<template x-for="row in entry.data">
															<tr>
																<td x-text="row.host"></td>
																<td x-text="row.class"></td>
																<td x-text="row.ttl"></td>
																<td x-text="row.ip"></td>
															</tr>
														</template>
													</tbody>
												</table>
											</div>
										</div>
                                    </div>
                                </template>
                            </div>
                        </template>
                </div>
            </div>
        </div>
    </div>
<section>

<?php 

$this->theme->view('components/features');
$this->load->view('core/middle_ad_spot');
$this->theme->view('components/faq');
$this->theme->view('includes/footer');