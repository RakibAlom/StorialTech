<?php

$this->theme->view('includes/header');

$this->theme->view('components/tools'); 

?>

<section x-data="window.bitflan.components.search_component()" x-init="init(<?php echo alpinify($js_errors) ?>, <?php echo $this->options->get('homepage-tlds') ?>)" @keyup.enter="submit()">
    <div class="searchSection mainPadding">
        <div class="searchInput">
            <input x-model="domain" type="text" placeholder="<?php echo lang('enter_domain_name') ?>" x-bind:class="error && 'border border-danger'" class="inputFiled form-control">
            <div x-show="domain.length" x-on:click="domain = ''" x-cloak class="searchCross">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.047" height="30.047" viewBox="0 0 30.047 30.047"><path d="M19.349,8.726H12.9a.379.379,0,0,1-.379-.379V1.9a1.9,1.9,0,0,0-3.794,0v6.45a.379.379,0,0,1-.379.379H1.9a1.9,1.9,0,0,0,0,3.794h6.45a.379.379,0,0,1,.379.379v6.45a1.9,1.9,0,0,0,3.794,0V12.9a.379.379,0,0,1,.379-.379h6.45a1.9,1.9,0,0,0,0-3.794Zm0,0" transform="translate(15.023) rotate(45)" fill="#b8b8b8"/></svg></div>
        </div>
        <button x-on:click="submit()" class="btn searchButton" type="submit" value="submit">
            <div class="blockGrad"></div>
            <span x-show="!sending"><?php echo lang('search_domain') ?></span>
            <span x-cloak x-show="sending"><img src="<?php echo $this->theme->url('assets/images/search_loader.svg') ?>" /></span>
        </button>
    </div>

    <template x-if="error_message.length">
        <div class="mt-3 mainPadding" x-transition >
            <div class="alert alert-danger" x-text="error_message"></div>
        </div>
    </template>
    
	<?php $this->load->view('core/header_ad_spot'); ?>

    <div x-cloak x-show="status == 'available' && prevDomain" x-transition class="mainPadding resultAvailorNotMain">
        <div class="resultAvailorNot availabel">
            <div class="leftSec">
                <h2><?php echo lang('prompt_available') ?></h2>
                <h1>
                    <span x-text="prevDomain"></span>
                    <span x-show="price" class="buy-price" x-text="'/ ' + price"></span>
                    <a target="_blank" :href="link" class="buy-now main-buy-now"><span><?php echo lang('buy_button') ?></span></a>
                </h1>
            </div>
            <div class="availMan"></div>
        </div>
    </div>

    <div x-cloak x-show="status == 'not-available' && prevDomain" x-transition class="mainPadding resultAvailorNotMain">
        <div class="resultAvailorNot notAvailabel">
            <div class="leftSec">
                <h2><?php echo lang('prompt_unavailable') ?></h2>
                <h1>
                    <span x-text="prevDomain"></span>
                    <a target="_blank" :href="link" class="whois-btn"><?php echo lang('whois_button') ?></a>
                </h1>
            </div>
            <div class="availMan"></div>
        </div>
    </div>

    <template x-if="others || suggestions" x-transition>
        <div class="result-content mainPadding" >
            <div class="row">
                <div class="col-lg-6">
                    <div class="result-content-inner">
						<div class="clearfix result-main-title">
							<div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 17.812 17.812"><path d="M16.221,7.315H10.814A.318.318,0,0,1,10.5,7V1.59a1.59,1.59,0,0,0-3.181,0V7A.318.318,0,0,1,7,7.315H1.59a1.59,1.59,0,0,0,0,3.181H7a.318.318,0,0,1,.318.318v5.407a1.59,1.59,0,1,0,3.181,0V10.814a.318.318,0,0,1,.318-.318h5.407a1.59,1.59,0,1,0,0-3.181Zm0,0"></path></svg></span><?php echo lang('popular_extensions') ?></div>
						</div>
                        <div class="extension-area">
                            <ul id="tlds_result_column1">
                                <template x-for="url in others_render">
                                    <li x-data="{ data: { status: 'blank', price: '', link: '#' } }" x-init="data = await singleQuery(url); console.log(data)">
                                        <a target="_blank" x-cloak :href="data.link" x-show="data.status == 'available'" class="right-by-wo-btn green-by-btn"><span><?php echo lang('buy_button') ?></span></a>
                                        <a target="_blank" x-cloak :href="data.link" x-show="data.status == 'not-available'" class="right-by-wo-btn red-by-btn"><span><?php echo lang('whois_button') ?></span></a>
                                        <div x-show="data.price" class="right-price-offer" x-show="data.status == 'available'" x-text="data.price"></div>
                                        <a target="_blank" x-cloak :href="data.link" x-show="data.status == 'blank'" class="right-by-wo-btn grey-by-btn"><span><img src="<?php echo $this->theme->url('assets/images/domainer_loader.svg') ?>" /></span></a>
                                        <div :class="data.status == 'not-available' && 'text-danger'" id="keyword_com" class="left-extension" x-text="url"></div>
                                        <div class="clearfix"></div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="result-content-inner">
						<div class="clearfix result-main-title">
							<div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 17.812 17.812"><path d="M16.221,7.315H10.814A.318.318,0,0,1,10.5,7V1.59a1.59,1.59,0,0,0-3.181,0V7A.318.318,0,0,1,7,7.315H1.59a1.59,1.59,0,0,0,0,3.181H7a.318.318,0,0,1,.318.318v5.407a1.59,1.59,0,1,0,3.181,0V10.814a.318.318,0,0,1,.318-.318h5.407a1.59,1.59,0,1,0,0-3.181Zm0,0"></path></svg></span><?php echo lang('domain_suggestions') ?></div>
						</div>
                        <div class="extension-area">
                            <ul id="tlds_result_column1">
                                <template x-for="domain in suggestions_render">
                                    <li>
                                        <a :href="domain.affiliate" target="_blank" class="right-by-wo-btn green-by-btn"><span><?php echo lang('buy_button') ?></span></a>
                                        <div x-show="domain.price" id="price_com" class="right-price-offer" x-text="domain.price"></div>
                                        <div id="keyword_com" class="left-extension" x-text="domain.name"></div>
                                        <div class="clearfix"></div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
	<template x-if="others.length || suggestions.length">
	<div class="text-center mt-4">
		<button @click="paginateTlds()" class="btn showmore-btn">
			<div class="blockGrad"></div>
			<span>Load More</span>
		</button>
	</div>
	</template>
<section>

<?php 

$this->theme->view('components/features');
$this->load->view('core/middle_ad_spot');
$this->theme->view('components/faq');
$this->theme->view('includes/footer');