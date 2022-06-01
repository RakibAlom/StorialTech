<?php

$this->theme->view('includes/header');

$this->theme->view('components/tools'); 

?>

<section x-data="window.bitflan.components.ip_lookup_component()" x-init="init(<?php echo alpinify($js_errors) ?>)" @keyup.enter="submit()">
    <div class="searchSection mainPadding">
        <div class="searchInput">
            <input x-model="domain" type="text" placeholder="<?php echo lang('enter_ip_address') ?>" x-bind:class="error && 'border border-danger'" class="inputFiled form-control">
            <div x-show="domain.length" x-on:click="domain = ''" x-cloak class="searchCross">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.047" height="30.047" viewBox="0 0 30.047 30.047"><path d="M19.349,8.726H12.9a.379.379,0,0,1-.379-.379V1.9a1.9,1.9,0,0,0-3.794,0v6.45a.379.379,0,0,1-.379.379H1.9a1.9,1.9,0,0,0,0,3.794h6.45a.379.379,0,0,1,.379.379v6.45a1.9,1.9,0,0,0,3.794,0V12.9a.379.379,0,0,1,.379-.379h6.45a1.9,1.9,0,0,0,0-3.794Zm0,0" transform="translate(15.023) rotate(45)" fill="#b8b8b8"/></svg></div>
        </div>
        <button x-on:click="submit()" class="btn searchButton" type="submit" value="submit">
            <div class="blockGrad"></div>
            <span x-show="!sending"><?php echo lang('lookup_ip') ?></span>
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
					<div class="left-title-area plus"><span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 53.494 53.494"><path d="M249.284,98.666a.784.784,0,0,0,.784-.784v-1.15a.784.784,0,1,0-1.567,0v1.15A.784.784,0,0,0,249.284,98.666Z" transform="translate(-222.536 -85.924)"></path><path d="M350.33,141.028a.783.783,0,0,0-1.108,0l-.813.813a.784.784,0,0,0,1.108,1.108l.813-.813A.784.784,0,0,0,350.33,141.028Z" transform="translate(-311.801 -126.088)"></path><path d="M390.012,248.5a.784.784,0,0,0,0,1.567h1.15a.784.784,0,1,0,0-1.567Z" transform="translate(-348.561 -222.537)"></path><path d="M348.939,348.409a.784.784,0,1,0-1.108,1.108l.813.813a.784.784,0,0,0,1.108-1.108Z" transform="translate(-311.284 -311.802)"></path><path d="M247.683,390.013v1.15a.784.784,0,0,0,1.567,0v-1.15a.784.784,0,0,0-1.567,0Z" transform="translate(-221.805 -348.562)"></path><path d="M141.263,347.832l-.813.813a.784.784,0,0,0,1.108,1.108l.813-.813a.784.784,0,0,0-1.108-1.108Z" transform="translate(-125.57 -311.285)"></path><path d="M96.732,247.684a.784.784,0,0,0,0,1.567h1.15a.784.784,0,0,0,0-1.567Z" transform="translate(-85.923 -221.806)"></path><path d="M142.95,141.264l-.813-.813a.784.784,0,0,0-1.108,1.108l.813.813a.784.784,0,0,0,1.108-1.108Z" transform="translate(-126.088 -125.571)"></path><path d="M194.342,159.079l5.582,2.87a.784.784,0,1,0,.717-1.394l-5.58-2.869a2.875,2.875,0,0,0-2.035-3.334v-7.987a.784.784,0,0,0-1.567,0v7.987a2.886,2.886,0,0,0-1.982,1.982h-3.889a.784.784,0,1,0,0,1.567h3.889a2.872,2.872,0,0,0,4.865,1.177Zm-2.1-.653a1.308,1.308,0,1,1,1.308-1.308A1.309,1.309,0,0,1,192.243,158.426Z" transform="translate(-165.495 -130.371)"></path><path d="M96.1,75.088a.784.784,0,0,0,.722-.841,21.016,21.016,0,1,0,0,3.253.784.784,0,1,0-1.563-.12,19.447,19.447,0,1,1,0-3.013A.782.782,0,0,0,96.1,75.088Z" transform="translate(-49.125 -49.125)"></path><path d="M148.187,7.834a26.755,26.755,0,0,0-33.338-3.615.784.784,0,1,0,.846,1.319,25.176,25.176,0,1,1,6.268,45.309.784.784,0,0,0-.454,1.5A26.75,26.75,0,0,0,148.187,7.834Z" transform="translate(-102.527)"></path><path d="M16.587,100.73a25.185,25.185,0,0,1-5.872-42.461.784.784,0,0,0-1-1.208,26.752,26.752,0,0,0,6.238,45.1.784.784,0,0,0,.633-1.434Z" transform="translate(0 -50.938)"></path></svg></span>Reverse IP Lookup</div>
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