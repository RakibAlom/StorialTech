<?php

$this->theme->view('includes/header');
$this->theme->view('components/tools'); 

?>

<section x-data="window.bitflan.components.location_component()" x-init="init(<?php echo alpinify($js_errors) ?>)" @keyup.enter="submit()">
    <div class="searchSection mainPadding">
        <div class="searchInput">
            <input x-model="domain" type="text" placeholder="<?php echo lang('enter_domain_name') ?>" x-bind:class="error && 'border border-danger'" class="inputFiled form-control">
            <div x-show="domain.length" x-on:click="domain = ''" x-cloak class="searchCross">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.047" height="30.047" viewBox="0 0 30.047 30.047"><path d="M19.349,8.726H12.9a.379.379,0,0,1-.379-.379V1.9a1.9,1.9,0,0,0-3.794,0v6.45a.379.379,0,0,1-.379.379H1.9a1.9,1.9,0,0,0,0,3.794h6.45a.379.379,0,0,1,.379.379v6.45a1.9,1.9,0,0,0,3.794,0V12.9a.379.379,0,0,1,.379-.379h6.45a1.9,1.9,0,0,0,0-3.794Zm0,0" transform="translate(15.023) rotate(45)" fill="#b8b8b8"/></svg></div>
        </div>
        <button x-on:click="submit()" class="btn searchButton" type="submit" value="submit">
            <div class="blockGrad"></div>
            <span x-show="!sending"><?php echo lang('get_location') ?></span>
            <span x-cloak x-show="sending"><img src="<?php echo $this->theme->url('assets/images/search_loader.svg') ?>" /></span>
        </button>
    </div>

    <template x-if="error_message.length">
        <div class="mt-3 mainPadding" x-transition >
            <div class="alert alert-danger" x-text="error_message"></div>
        </div>
    </template>
    
	<?php $this->load->view('core/header_ad_spot'); ?>

    <template x-if="data">
        <div class="result-content mainPadding" x-transition >
            <div class="result-content-inner">
				<div class="result-main-title clearfix">
					<div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 33.859 48.155"><g transform="translate(-76)"><g transform="translate(76)"><path d="M92.929,0a16.933,16.933,0,0,0-14.4,25.832L91.966,47.488a1.411,1.411,0,0,0,1.2.667h.011a1.41,1.41,0,0,0,1.2-.686l13.1-21.866A16.933,16.933,0,0,0,92.929,0Zm12.12,24.154L93.143,44.034,80.925,24.345a14.117,14.117,0,1,1,24.124-.191Z" transform="translate(-76)"></path></g><g transform="translate(84.465 8.465)"><path d="M174.465,90a8.465,8.465,0,1,0,8.465,8.465A8.474,8.474,0,0,0,174.465,90Zm0,14.127a5.662,5.662,0,1,1,5.653-5.662A5.666,5.666,0,0,1,174.465,104.127Z" transform="translate(-166 -90)"></path></g></g></svg></span>Domain Location</div>
				</div>
                <div class="extension-area">
                    <ul class="tlds_result">
                        <template x-for="key in Object.keys(data)" :key="key">
                            <li x-show="key != 'completed_requests'">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div id="keyword_com" class="left-extension text-dark"><b x-text="key.toUpperCase().replace('_', ' ')"></b></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div id="keyword_com" class="left-extension" x-show="key != 'country_flag'" x-text="data[key]"></div>
                                        <div id="keyword_com" class="left-extension" x-show="key == 'country_flag'"><img :src="data[key]" style="width: 24px; height: auto;" /></div>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </template>
<section>

<?php 

$this->theme->view('components/features');
$this->load->view('core/middle_ad_spot');
$this->theme->view('components/faq');
$this->theme->view('includes/footer');