<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href='{{ route('account') }}'>My Account</a></li>
                            <li><a href='{{ route('wishlist') }}'>Wishlist</a></li>
                            <li><a href="{{ route('account') }}">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Need help? Call Us: <strong class="text-brand"> + 1800 900</strong></li>
                            <li>
                                <a class="language-dropdown-active" href="#">English <i
                                        class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('user/assets/imgs/theme/flag-fr.png') }}"
                                                alt="" />Français</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('user/assets/imgs/theme/flag-dt.png') }}"
                                                alt="" />Deutsch</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('user/assets/imgs/theme/flag-ru.png') }}"
                                                alt="" />Pусский</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="language-dropdown-active" href="#">USD <i
                                        class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('user/assets/imgs/theme/flag-fr.png') }}"
                                                alt="" />INR</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('user/assets/imgs/theme/flag-dt.png') }}"
                                                alt="" />MBP</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('user/assets/imgs/theme/flag-ru.png') }}"
                                                alt="" />EU</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href='{{ route('/') }}'><img src="{{ asset('user/assets/imgs/theme/logo.svg') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                            <form action="{{route('search.product')}}" method="GET" >
                                <select class="select-active">
                                <option>All Categories</option>
                                <option>Milks and Dairies</option>
                                <option>Wines & Alcohol</option>
                                <option>Clothing & Beauty</option>
                                <option>Pet Foods & Toy</option>
                                <option>Fast food</option>
                                <option>Baking material</option>
                                <option>Vegetables</option>
                                <option>Fresh Seafood</option>
                                <option>Noodles & Rice</option>
                                <option>Ice cream</option>
                            </select>
                            <style>
                                /* Basic styling for search input */
                                .search__input {
                                    width: 100%;
                                    padding: 8px;
                                    font-size: 16px;
                                    border: 1px solid #ccc;
                                    border-radius: 4px;
                                }
                        
                                /* Suggestions container styling */
                                #search_suggestions {
                                    position: absolute;
                                    width: 100%;
                                    border: 1px solid #ccc;
                                    border-top: none;
                                    background-color: white;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                    z-index: 1000;
                                }
                        
                                /* Suggestions list styling */
                                #search_suggestions ul {
                                    list-style-type: none;
                                    margin: 0;
                                    padding: 0;
                                }
                        
                                /* Suggestion item styling */
                                .suggestion-item {
                                    padding: 8px;
                                    cursor: pointer;
                                }
                        
                                /* Suggestion item hover effect */
                                .suggestion-item:hover {
                                    background-color: #f0f0f0;
                                }
                                .search-button:hover{
                                    background-color: none !important;                                    
                                }
                            </style>
                            <div style="position: relative; width:500px; margin: 0px auto;">
                                <input id="search_input" class="search__input" name="query" type="text" placeholder="Search for items...">
                                <input type="hidden" name="query" id="search">
                                
                                <div class="" id="search_suggestions"></div>
                            </div>       
                             <button class="search-button btn btn-sm rounded" type="submit" style="background: none; border: none;padding: 0; cursor: pointer;">
                                <img src="{{asset('user/assets/imgs/theme/icons/search.png')}}">
                            </button>
                                               
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div>
                            <div class="header-action-icon-2">
                                <a href='{{ route('compare') }}'>
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-compare.svg') }}" />
                                    @guest
                                    @else
                                        <span class="pro-count blue">3</span>
                                    @endguest
                                </a>
                                <a href='{{ route('compare') }}'><span class="lable ml-0">Compare</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href='shop-wishlist.html'>
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    @guest
                                    @else
                                        <span id="head_wishcount" class="pro-count blue">0</span>

                                    @endguest
                                </a>
                                <a href='{{ route('wishlist') }}'><span class="lable">Wishlist</span></a>
                            </div>

                            <div class="header-action-icon-2">
                                <a class='mini-cart-icon' href='{{ route('cart') }}'>
                                    <img alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    @guest
                                    @else
                                        <span id="head_cartcount" class="pro-count blue">0</span>

                                    @endguest
                                </a>
                                <a href='{{ route('cart') }}'><span class="lable">Cart</span></a>
                                @guest
                                @else
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul id="dropcart__item" style="max-height: 300px; overflow-y: auto;">
                                        </ul>
                                        <div class="shopping-cart-footer" id="totaldiv">
                                        </div>
                                    </div>
                                @endguest
                            </div>
                            <div class="header-action-icon-2">
                                <a href='javascript:;'>
                                    <img class="svgInject" alt="Nest"
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                @if (Auth::user())
                                    <a href='javascript:;'><span
                                            class="lable ml-0">{{ Auth::user()->name }}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href='{{ route('account') }}'><i
                                                        class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                            <li>
                                                <a href='{{ route('account') }}'><i
                                                        class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href='{{ route('account') }}'><i
                                                        class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                            </li>
                                            <li>
                                                <a href='{{ route('wishlist') }}'><i
                                                        class="fi fi-rs-heart mr-10"></i>My
                                                    Wishlist</a>
                                            </li>
                                            <li>
                                                <a href='{{ route('account') }}'><i
                                                        class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"><i
                                                        class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                @else
                                    <a href='javascript:;'><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href='{{ route('login') }}'><i class="fi fi-rs-user mr-10"></i>Log
                                                    in</a>
                                            </li>

                                            <li>
                                                <a href='{{ route('register') }}'><i
                                                        class="fi fi-rs-user-add mr-10"></i>Register</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href='{{ route('/') }}'><img src="{{ asset('user/assets/imgs/theme/logo.svg') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-1.svg') }}"
                                                alt="" />Milks and Dairies</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-2.svg') }}"
                                                alt="" />Clothing & beauty</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-3.svg') }}"
                                                alt="" />Pet Foods & Toy</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-4.svg') }}"
                                                alt="" />Baking material</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-5.svg') }}"
                                                alt="" />Fresh Fruit</a>
                                    </li>
                                </ul>
                                <ul class="end">
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-6.svg') }}"
                                                alt="" />Wines & Drinks</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-7.svg') }}"
                                                alt="" />Fresh Seafood</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-8.svg') }}"
                                                alt="" />Fast food</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-9.svg') }}"
                                                alt="" />Vegetables</a>
                                    </li>
                                    <li>
                                        <a href='shop-grid-right.html'> <img
                                                src="{{ asset('user/assets/imgs/theme/icons/category-10.svg') }}"
                                                alt="" />Bread and Juice</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href='shop-grid-right.html'> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/icon-1.svg') }}"
                                                    alt="" />Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href='shop-grid-right.html'> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/icon-2.svg') }}"
                                                    alt="" />Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href='shop-grid-right.html'> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/icon-3.svg') }}"
                                                    alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href='shop-grid-right.html'> <img
                                                    src="{{ asset('user/assets/imgs/theme/icons/icon-4.svg') }}"
                                                    alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show
                                    more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img
                                        src="{{ asset('user/assets/imgs/theme/icons/icon-hot.svg') }}"
                                        alt="hot deals" /><a href='#'>Deals</a></li>
                                <li>
                                    <a class="{{ Request::is('home') ? 'active' : '' }}"
                                        href='{{ route('/') }}'>Home</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('about') ? 'active' : '' }}"
                                        href='{{ route('about') }}'>About</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('shop/list') ? 'active' : '' }}"
                                        href='{{ route('shop.list') }}'>Shop</a>

                                </li>
                                <li>
                                    <a class="{{ Request::is('vendor/list') ? 'active' : '' }}"
                                        href="{{ route('vendor.list') }}">Vendors</a>

                                </li>
                                <li class="position-static">
                                    <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Fruit & Vegetables</a>
                                            <ul>
                                                <li><a href='javascript:;'>Meat & Poultry</a></li>
                                                <li><a href='javascript:;'>Fresh Vegetables</a></li>
                                                <li><a href='javascript:;'>Herbs & Seasonings</a></li>
                                                <li><a href='javascript:;'>Cuts & Sprouts</a></li>
                                                <li><a href='javascript:;'>Exotic Fruits & Veggies</a></li>
                                                <li><a href='javascript:;'>Packaged Produce</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Breakfast & Dairy</a>
                                            <ul>
                                                <li><a href='javascript:;'>Milk & Flavoured Milk</a></li>
                                                <li><a href='javascript:;'>Butter and Margarine</a></li>
                                                <li><a href='javascript:;'>Eggs Substitutes</a></li>
                                                <li><a href='javascript:;'>Marmalades</a></li>
                                                <li><a href='javascript:;'>Sour Cream</a></li>
                                                <li><a href='javascript:;'>Cheese</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="#">Meat & Seafood</a>
                                            <ul>
                                                <li><a href='javascript:;'>Breakfast Sausage</a></li>
                                                <li><a href='javascript:;'>Dinner Sausage</a></li>
                                                <li><a href='javascript:;'>Chicken</a></li>
                                                <li><a href='javascript:;'>Sliced Deli Meat</a></li>
                                                <li><a href='javascript:;'>Wild Caught Fillets</a></li>
                                                <li><a href='javascript:;'>Crab and Shellfish</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href='javascript:;'><img
                                                        src="{{ asset('user/assets/imgs/banner/banner-menu.png') }}"
                                                        alt="Nest" /></a>
                                                <div class="menu-banner-content">
                                                    <h4>Hot deals</h4>
                                                    <h3>
                                                        Don't miss<br />
                                                        Trending
                                                    </h3>
                                                    <div class="menu-banner-price">
                                                        <span class="new-price text-success">Save to 50%</span>
                                                    </div>
                                                    <div class="menu-banner-btn">
                                                        <a href='javascript:;'>Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="menu-banner-discount">
                                                    <h3>
                                                        <span>25%</span>
                                                        off
                                                    </h3>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="{{ Request::is('blog') ? 'active' : '' }}"
                                        href='{{ route('blog') }}'>Blog </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('privacy') ? 'active' : '' }}" href="#">Pages <i
                                            class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">


                                        <li><a href='{{ route('forget.password') }}'>Forgot password</a></li>
                                        <li><a href='{{ route('reset.password') }}'>Reset password</a></li>
                                        <li><a href='{{ route('purchase') }}'>Purchase Guide</a></li>
                                        <li><a class="{{ Request::is('privacy') ? 'active' : '' }}"
                                                href='{{ route('privacy') }}'>Privacy Policy</a></li>
                                        <li><a class="{{ Request::is('terms') ? 'active' : '' }}"
                                                href='{{ route('terms') }}'>Terms of Service</a></li>
                                        {{-- <li><a href='{{ route('error') }}'>404 Page</a></li> --}}
                                    </ul>
                                </li>
                                <li>
                                    <a class="{{ Request::is('contact') ? 'active' : '' }}"
                                        href='{{ route('contact') }}'>Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('user/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>1900 - 888<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href='shop-wishlist.html'>
                                <img alt="Nest"
                                    src="{{ asset('user/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span id="head_wishcount" class="pro-count white">0</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest"
                                    src="{{ asset('user/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href='javascript:;'><img alt="Nest"
                                                    src="{{ asset('user/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href='javascript:;'>Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href='javascript:;'><img alt="Nest"
                                                    src="{{ asset('user/assets/imgs/shop/thumbnail-4.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href='javascript:;'>Macbook Pro 2024</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href='shop-cart.html'>View cart</a>
                                        <a href='shop-checkout.html'>Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href='index.html'><img src="{{ asset('user/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href='index.html'>Home</a>
                            <ul class="dropdown">
                                <li><a href='index.html'>Home 1</a></li>
                                <li><a href='index-3.html'>Home 2</a></li>
                                <li><a href='index-4.html'>Home 3</a></li>
                                <li><a href='index-5.html'>Home 4</a></li>
                                <li><a href='index-6.html'>Home 5</a></li>
                                <li><a href='index-7.html'>Home 6</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href='shop-grid-right.html'>shop</a>
                            <ul class="dropdown">
                                <li><a href='shop-grid-right.html'>Shop Grid – Right Sidebar</a></li>
                                <li><a href='shop-grid-left.html'>Shop Grid – Left Sidebar</a></li>
                                <li><a href='shop-list-right.html'>Shop List – Right Sidebar</a></li>
                                <li><a href='shop-list-left.html'>Shop List – Left Sidebar</a></li>
                                <li><a href='shop-fullwidth.html'>Shop - Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href='javascript:;'>Product – Right Sidebar</a></li>
                                        <li><a href='shop-product-left.html'>Product – Left Sidebar</a></li>
                                        <li><a href='shop-product-full.html'>Product – No sidebar</a></li>
                                        <li><a href='shop-product-vendor.html'>Product – Vendor Infor</a></li>
                                    </ul>
                                </li>
                                <li><a href='shop-filter.html'>Shop – Filter</a></li>
                                <li><a href='shop-wishlist.html'>Shop – Wishlist</a></li>
                                <li><a href='shop-cart.html'>Shop – Cart</a></li>
                                <li><a href='shop-checkout.html'>Shop – Checkout</a></li>
                                <li><a href='javascript:;'>Shop – Compare</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop Invoice</a>
                                    <ul class="dropdown">
                                        <li><a href='shop-invoice-1.html'>Shop Invoice 1</a></li>
                                        <li><a href='shop-invoice-2.html'>Shop Invoice 2</a></li>
                                        <li><a href='shop-invoice-3.html'>Shop Invoice 3</a></li>
                                        <li><a href='shop-invoice-4.html'>Shop Invoice 4</a></li>
                                        <li><a href='shop-invoice-5.html'>Shop Invoice 5</a></li>
                                        <li><a href='shop-invoice-6.html'>Shop Invoice 6</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Vendors</a>
                            <ul class="dropdown">
                                <li><a href='vendors-grid.html'>Vendors Grid</a></li>
                                <li><a href='vendors-list.html'>Vendors List</a></li>
                                <li><a href='vendor-details-1.html'>Vendor Details 01</a></li>
                                <li><a href='vendor-details-2.html'>Vendor Details 02</a></li>
                                <li><a href='vendor-dashboard.html'>Vendor Dashboard</a></li>
                                <li><a href='vendor-guide.html'>Vendor Guide</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Mega menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href='javascript:;'>Dresses</a></li>
                                        <li><a href='javascript:;'>Blouses & Shirts</a></li>
                                        <li><a href='javascript:;'>Hoodies & Sweatshirts</a></li>
                                        <li><a href='javascript:;'>Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href='javascript:;'>Jackets</a></li>
                                        <li><a href='javascript:;'>Casual Faux Leather</a></li>
                                        <li><a href='javascript:;'>Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href='javascript:;'>Gaming Laptops</a></li>
                                        <li><a href='javascript:;'>Ultraslim Laptops</a></li>
                                        <li><a href='javascript:;'>Tablets</a></li>
                                        <li><a href='javascript:;'>Laptop Accessories</a></li>
                                        <li><a href='javascript:;'>Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href='blog-category-fullwidth.html'>Blog</a>
                            <ul class="dropdown">
                                <li><a href='blog-category-grid.html'>Blog Category Grid</a></li>
                                <li><a href='blog-category-list.html'>Blog Category List</a></li>
                                <li><a href='blog-category-big.html'>Blog Category Big</a></li>
                                <li><a href='blog-category-fullwidth.html'>Blog Category Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product Layout</a>
                                    <ul class="dropdown">
                                        <li><a href='blog-post-left.html'>Left Sidebar</a></li>
                                        <li><a href='blog-post-right.html'>Right Sidebar</a></li>
                                        <li><a href='blog-post-fullwidth.html'>No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href='page-about.html'>About Us</a></li>
                                <li><a href='page-contact.html'>Contact</a></li>
                                <li><a href='page-account.html'>My Account</a></li>
                                <li><a href='page-login.html'>Login</a></li>
                                <li><a href='page-register.html'>Register</a></li>
                                <li><a href='page-forgot-password.html'>Forgot password</a></li>
                                <li><a href='page-reset-password.html'>Reset password</a></li>
                                <li><a href='page-purchase-guide.html'>Purchase Guide</a></li>
                                <li><a href='page-privacy-policy.html'>Privacy Policy</a></li>
                                <li><a href='page-terms.html'>Terms of Service</a></li>
                                <li><a href='page-404.html'>404 Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href='page-contact.html'><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href='page-login.html'><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                        alt="" /></a>
                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                        alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2024 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#search_input').on('input', function() {
            var query = $(this).val();

            if (query.length >= 1) {
                $.ajax({
                    url: '/search-suggestions',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        var suggestionsContainer = $('#search_suggestions');
                        suggestionsContainer.empty();

                        if (data.length > 0) {
                            // Generate HTML for suggestions and append them to the container
                            var suggestionsHTML = '<ul>';
                            data.forEach(function(suggestion) {
                                suggestionsHTML +=
                                    '<li class="suggestion-item">' +
                                    suggestion + '</li>';
                            });
                            suggestionsHTML += '</ul>';
                            suggestionsContainer.html(suggestionsHTML);
                            suggestionsContainer.show(); // Show the suggestions container
                        } else {
                            suggestionsContainer.hide();
                        }
                    }
                });
            } else {
                $('#search_suggestions').hide();
            }
        });

        // Click event handler for suggestion items
        $('#search_suggestions').on('click', '.suggestion-item', function() {
            var selectedSuggestion = $(this).text();
            $('#search_input').val(selectedSuggestion);
            $('#search').val(selectedSuggestion);
            $('#search_suggestions').hide();
        });
    });
</script>
<!--End header-->
<main class="main">
