<div class="nav-outer clearfix">
    <!--Mobile Navigation Toggler For Mobile-->
    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
    <nav class="main-menu navbar-expand-md navbar-light">
        <div class="navbar-header">
            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Website/header.toggle_navigation') }}">
                <span class="icon flaticon-menu"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
            <ul class="navigation clearfix">
                <li class="current dropdown"><a href="#">{{ __('Website/header.home') }}</a>
                    <ul>
                        <li><a href="index.html">{{ __('Website/header.home_page_01') }}</a></li>
                        <li><a href="index-2.html">{{ __('Website/header.home_page_02') }}</a></li>
                        <li><a href="index-3.html">{{ __('Website/header.home_page_03') }}</a></li>
                        <li><a href="index-4.html">{{ __('Website/header.home_page_04') }}</a></li>
                        <li class="dropdown"><a href="#">{{ __('Website/header.header_styles') }}</a>
                            <ul>
                                <li><a href="index.html">{{ __('Website/header.header_style_one') }}</a></li>
                                <li><a href="index-2.html">{{ __('Website/header.header_style_two') }}</a></li>
                                <li><a href="index-3.html">{{ __('Website/header.header_style_three') }}</a></li>
                                <li><a href="index-4.html">{{ __('Website/header.header_style_four') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ __('Website/header.about_us') }}</a>
                    <ul>
                        <li><a href="about.html">{{ __('Website/header.about_us') }}</a></li>
                        <li><a href="team.html">{{ __('Website/header.our_team') }}</a></li>
                        <li><a href="faq.html">{{ __('Website/header.faq') }}</a></li>
                        <li><a href="services.html">{{ __('Website/header.services') }}</a></li>
                        <li><a href="gallery.html">{{ __('Website/header.gallery') }}</a></li>
                        <li><a href="comming-soon.html">{{ __('Website/header.coming_soon') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown has-mega-menu"><a href="#">{{ __('Website/header.pages') }}</a>
                    <div class="mega-menu">
                        <div class="mega-menu-bar row clearfix">
                            <div class="column col-md-3 col-xs-12">
                                <h3>{{ __('Website/header.about_us') }}</h3>
                                <ul>
                                    <li><a href="about.html">{{ __('Website/header.about_us') }}</a></li>
                                    <li><a href="team.html">{{ __('Website/header.our_team') }}</a></li>
                                    <li><a href="faq.html">{{ __('Website/header.faq') }}</a></li>
                                    <li><a href="services.html">{{ __('Website/header.services') }}</a></li>
                                </ul>
                            </div>
                            <div class="column col-md-3 col-xs-12">
                                <h3>{{ __('Website/header.doctors') }}</h3>
                                <ul>
                                    <li><a href="doctors.html">{{ __('Website/header.doctors') }}</a></li>
                                    <li><a href="doctors-detail.html">{{ __('Website/header.doctors_detail') }}</a></li>
                                </ul>
                            </div>
                            <div class="column col-md-3 col-xs-12">
                                <h3>{{ __('Website/header.blog') }}</h3>
                                <ul>
                                    <li><a href="blog.html">{{ __('Website/header.our_blog') }}</a></li>
                                    <li><a href="blog-classic.html">{{ __('Website/header.blog_classic') }}</a></li>
                                    <li><a href="blog-detail.html">{{ __('Website/header.blog_detail') }}</a></li>
                                </ul>
                            </div>
                            <div class="column col-md-3 col-xs-12">
                                <h3>{{ __('Website/header.shops') }}</h3>
                                <ul>
                                    <li><a href="shop.html">{{ __('Website/header.shop') }}</a></li>
                                    <li><a href="shop-single.html">{{ __('Website/header.shop_details') }}</a></li>
                                    <li><a href="shoping-cart.html">{{ __('Website/header.cart_page') }}</a></li>
                                    <li><a href="checkout.html">{{ __('Website/header.checkout_page') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown"><a href="#">{{ __('Website/header.doctors') }}</a>
                    <ul>
                        <li><a href="doctors.html">{{ __('Website/header.doctors') }}</a></li>
                        <li><a href="doctors-detail.html">{{ __('Website/header.doctors_detail') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ __('Website/header.department') }}</a>
                    <ul>
                        <li><a href="department.html">{{ __('Website/header.department') }}</a></li>
                        <li><a href="department-detail.html">{{ __('Website/header.department_detail') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ __('Website/header.blog') }}</a>
                    <ul>
                        <li><a href="blog.html">{{ __('Website/header.our_blog') }}</a></li>
                        <li><a href="blog-classic.html">{{ __('Website/header.blog_classic') }}</a></li>
                        <li><a href="blog-detail.html">{{ __('Website/header.blog_detail') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">{{ __('Website/header.shop') }}</a>
                    <ul>
                        <li><a href="shop.html">{{ __('Website/header.shop') }}</a></li>
                        <li><a href="shop-single.html">{{ __('Website/header.shop_details') }}</a></li>
                        <li><a href="shoping-cart.html">{{ __('Website/header.cart_page') }}</a></li>
                        <li><a href="checkout.html">{{ __('Website/header.checkout_page') }}</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">{{ __('Website/header.contact') }}</a></li>
                <li class="dropdown"><a href="#">{{ __('Website/header.language') }}</a>
                    <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Main Menu End-->

    <!-- Main Menu End-->
    <div class="outer-box clearfix">
        <!-- Main Menu End-->
        <div class="nav-box">
            <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
        </div>

        <!-- Social Box -->
        <ul class="social-box clearfix">
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-google"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-skype"></span></a></li>
            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
            <li><a title="Login" href="{{ route('dashboard.user') }}"><span class="fas fa-user"></span></a></li>

        </ul>

        <!-- Search Btn -->
        <div class="search-box-btn"><span class="icon flaticon-search"></span></div>
    </div>
</div>