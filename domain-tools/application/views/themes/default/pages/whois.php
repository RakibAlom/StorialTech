<?php

$this->theme->view('includes/header');

$this->theme->view('components/tools'); 

?>

<section x-data="window.bitflan.components.whois_component()" x-init="init('<?php echo isset($domain) ? $domain : '' ?>', <?php echo alpinify($js_errors) ?>)" @keyup.enter="submit()">
    <div class="searchSection mainPadding">
        <div class="searchInput">
            <input x-model="domain" type="text" placeholder="<?php echo lang('enter_domain_name') ?>" x-bind:class="error && 'border border-danger'" class="inputFiled form-control">
            <div x-show="domain.length" x-on:click="domain = ''" x-cloak class="searchCross">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.047" height="30.047" viewBox="0 0 30.047 30.047"><path d="M19.349,8.726H12.9a.379.379,0,0,1-.379-.379V1.9a1.9,1.9,0,0,0-3.794,0v6.45a.379.379,0,0,1-.379.379H1.9a1.9,1.9,0,0,0,0,3.794h6.45a.379.379,0,0,1,.379.379v6.45a1.9,1.9,0,0,0,3.794,0V12.9a.379.379,0,0,1,.379-.379h6.45a1.9,1.9,0,0,0,0-3.794Zm0,0" transform="translate(15.023) rotate(45)" fill="#b8b8b8"/></svg></div>
        </div>
        <button x-on:click="submit()" class="btn searchButton" type="submit" value="submit">
            <div class="blockGrad"></div>
            <span x-show="!sending"><?php echo lang('get_whois') ?></span>
            <span x-cloak x-show="sending"><img src="<?php echo $this->theme->url('assets/images/search_loader.svg') ?>" /></span>
        </button>
    </div>

    <template x-if="error_message.length">
        <div class="mt-3 mainPadding" x-transition >
            <div class="alert alert-danger" x-text="error_message"></div>
        </div>
    </template>

    <?php $this->load->view('core/header_ad_spot'); ?>

    <div class="result-content mainPadding" x-cloak x-show="data" x-transition >
        <div class="result-content-inner">
            <div class="clearfix result-main-title">
                <div class="left-title-area plus">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="17.812" height="17.812" viewBox="0 0 16.67 28.652"><g transform="translate(-18.337 -13.388)"><circle cx="2.605" cy="2.605" r="2.605" transform="translate(24.068 36.831)"></circle><path d="M184.335,128.5A8.345,8.345,0,0,0,176,136.835a2.084,2.084,0,1,0,4.168,0A4.168,4.168,0,1,1,184.335,141a2.084,2.084,0,0,0-2.084,2.084V148.3a2.084,2.084,0,0,0,4.168,0v-3.389a8.336,8.336,0,0,0-2.084-16.407Z" transform="translate(-157.663 -115.112)"></path></g></svg></span><span id="urlLabel" x-text="prevDomain + ' WHOIS Info:'"></span>
                </div>
            </div>
            <div class="extension-area">
                <div class="whoisText" x-text="data"></div>
            </div>
        </div>
    </div>

    <div x-cloak x-show="available" x-transition class="mainPadding resultAvailorNotMain">
        <div class="resultAvailorNot availabel">
            <div class="leftSec">
                <h2><?php echo lang('prompt_available') ?></h2>
                <h1>
                    <span x-text="prevDomain"></span>
                    <span x-show="price" class="buy-price" x-text="'/ ' + price"></span>
                    <a :href="link" class="buy-now main-buy-now"><span><?php echo lang('buy_button') ?></span></a>
                </h1>
            </div>
            <div class="availMan"></div>
        </div>
    </div>
<section>

<?php 

$this->theme->view('components/features');
$this->load->view('core/middle_ad_spot');
$this->theme->view('components/faq');
$this->theme->view('includes/footer');