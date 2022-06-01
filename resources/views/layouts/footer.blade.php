@php
    $platform = App\Models\Custom\PlatformControl::first();
@endphp
<!-- Footer Start-->
<hr style="margin:0px">
<footer class="pt-50 pb-20 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget mb-30">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">About me</h5>
                    </div>
                    <div class="textwidget">
                        <p>
                            {{ $setting->short_about }}
                        </p>
                        <p><strong class="color-black">Address</strong><br>
                            {{ $setting->address }}</p>
                        <p><strong class="color-black">Follow me</strong><br>
                            <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                                <li class="list-inline-item"><a class="fb" href="{{ $setting->fb_link }}" target="_blank" title="Facebook"><i class="elegant-icon social_facebook"></i></a></li>
                                <li class="list-inline-item"><a class="tw" href="{{ $setting->twitter_link }}" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                <li class="list-inline-item"><a class="pt" href="{{ $setting->pinterest_link }}" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="sidebar-widget widget_categories mb-30" data-wow-delay="0.1s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Quick link</h5>
                    </div>
                    <ul class="font-small">
                        <li class="cat-item cat-item-2"><a href="{{ route('about') }}">About </a></li>
                        <li class="cat-item cat-item-7"><a href="{{ route('contact') }}">Contact</a></li>
                        <li class="cat-item cat-item-4"><a href="{{ route('help') }}">Help & Support</a></li>
                        <li class="cat-item cat-item-5"><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li class="cat-item cat-item-6"><a href="{{ route('terms') }}">Terms & Condition</a></li>
                        <li class="cat-item cat-item-7"><a href="{{ route('faq') }}">FAQ</a></li>
                        <li class="cat-item cat-item-7"><a href="{{ route('feed') }}">RSS Feed</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget widget_tagcloud mb-30" data-wow-delay="0.2s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Tagcloud</h5>
                    </div>
                    @php
                        $bcates = App\Models\Category\CategoryBlog::where('status', 1)->orderBy('views', 'desc')->take(3)->get();
                        $tucates = App\Models\Category\CategoryTutorial::where('status', 1)->orderBy('views', 'desc')->take(3)->get();
                    @endphp
                    <div class="tagcloud mt-20">
                        
                @if($platform->blog_status == 1)
                    @foreach($bcates as $item)
                        <a class="tag-cloud-link" href="{{ $item->path() }}" title="{{ $item->name }}">{{ Str::words($item->name,2,'') }}</a>
                    @endforeach
                @endif
                @if($platform->tutorial_status == 1)
                    @foreach($tucates as $item)
                        <a class="tag-cloud-link" href="{{ $item->path() }}" title="{{ $item->name }}">{{ Str::words($item->name,2,'') }}</a>
                    @endforeach
                @endif
                    </div>
                </div>
            </div> 
            <div class="col-lg-3 col-md-6">
                <div class="sidebar-widget widget_newsletter mb-30" data-wow-delay="0.3s">
                    <div class="widget-header-2 position-relative mb-30">
                        <h5 class="mt-5 mb-30">Newsletter</h5>
                    </div>
                    <div class="newsletter">
                        <p class="font-medium">Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                        <form class="input-group form-subcriber mt-30 d-flex" method="post" action="{{ route('store.subscribe') }}">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-primary text-white" type="submit">Subscribe</button>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label class="mt-20"> <input class="mr-5" name="name" type="checkbox" value="1" required=""> I agree to the <a href="{{ route('terms') }}" target="_blank">terms &amp; conditions</a> </label>
                            @csrf
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="footer-copy-right pt-10 wow fadeInUp animated">
            <p class="float-md-left font-small text-muted">{{ $setting->copyright }}</p>
            <p class="float-md-right font-small text-muted">
                Develop By <a href="https://facebook.com/rakibalomprogrammer" class="text-primary">Rakib Alom</a> | All rights reserved
            </p>
        </div>
    </div>
</footer>
<!-- End Footer -->
