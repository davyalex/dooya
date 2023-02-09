<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}-@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css') }}">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>


    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <!-- Banner Popup Start -->
        <div class="popup_banner">
            <span class="popup_off_banner">×</span>
            <div class="banner_popup_area">
                    <img src="img/banner/pop-banner.jpg" alt="">
            </div>
        </div>
        <!-- Banner Popup End -->
       <!-- Newsletter Popup Start -->
        <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off">Close</span>
                <div class="subscribe_area text-center mt-60">
                    <h2>Newsletter</h2>
                    <p>Subscribe to the Truemart mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                    <div class="subscribe-form-group">
                        <form action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom mt-15">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Popup End -->
        <!-- Main Header Area Start Here -->
        <header>
            <!-- Header Top Start Here -->
            <div class="header-top-area">
                <div class="container">
                    <!-- Header Top Start -->
                    <div class="header-top">
                        <ul>
                            <li><a href="#">Free Shipping on order over $99</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                        <ul>                                          
                            <li><span>Language</span> <a href="#">English<i class="lnr lnr-chevron-down"></i></a>
                                <!-- Dropdown Start -->
                                <ul class="ht-dropdown">
                                    <li><a href="#"><img src="img/header/1.jpg" alt="language-selector">English</a></li>
                                    <li><a href="#"><img src="img/header/2.jpg" alt="language-selector">Francis</a></li>
                                </ul>
                                <!-- Dropdown End -->
                            </li>
                            <li><span>Currency</span><a href="#"> USD $ <i class="lnr lnr-chevron-down"></i></a>
                                <!-- Dropdown Start -->
                                <ul class="ht-dropdown">
                                    <li><a href="#">&#36; USD</a></li>
                                    <li><a href="#"> € Euro</a></li>
                                    <li><a href="#">&#163; Pound Sterling</a></li>
                                </ul>
                                <!-- Dropdown End -->
                            </li>
                            <li><a href="#">My Account<i class="lnr lnr-chevron-down"></i></a>
                                <!-- Dropdown Start -->
                                <ul class="ht-dropdown">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                </ul>
                                <!-- Dropdown End -->
                            </li> 
                        </ul>
                    </div>
                    <!-- Header Top End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Top End Here -->
            <!-- Header Middle Start Here -->
            <div class="header-middle ptb-15">
                <div class="container">
                    <div class="row align-items-center no-gutters">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30">
                                <a href="index.html"><img src="{{ asset('img/logo/logo_site.jpg') }}" width="50px" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                            <div class="categorie-search-box">
                                <form action="#">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="poscats">
                                            <option value="0">All categories</option>
                                            <option value="2">Arrivals</option>
                                            <option value="3">Cameras</option>
                                            <option value="4">Cords and Cables</option>
                                            <option value="5">gps accessories</option>
                                            <option value="6">Microphones</option>
                                            <option value="7">Wireless Transmitters</option>
                                            <option value="8">GamePad</option>
                                            <option value="9">cube lifestyle hd</option>
                                            <option value="10">Bags</option>
                                            <option value="11">Bottoms</option>
                                            <option value="12">Shirts</option>
                                            <option value="13">Tailored</option>
                                            <option value="14">Home &amp; Kitchen</option>
                                            <option value="15">Large Appliances</option>
                                            <option value="16">Armchairs</option>
                                            <option value="17">Bunk Bed</option>
                                            <option value="18">Mattress</option>
                                            <option value="19">Sideboard</option>
                                            <option value="20">Small Appliances</option>
                                            <option value="21">Bootees Bags</option>
                                            <option value="22">Jackets</option>
                                            <option value="23">Shelf</option>
                                            <option value="24">Shoes</option>
                                            <option value="25">Phones &amp; Tablets</option>
                                            <option value="26">Tablet</option>
                                            <option value="27">phones</option>
                                        </select>
                                    </div>
                                    <input type="text" name="search" placeholder="I’m shopping for...">
                                    <button><i class="lnr lnr-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-4 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    <li><a href="#"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">2</span><span>cart</span></span></a>
                                        <ul class="ht-dropdown cart-box-width">
                                            <li>
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img/products/1.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Summer Red </a></h6>
                                                        <span class="cart-price">27.45</span>
                                                        <span>Size: S</span>
                                                        <span>Color: Yellow</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div>
                                                <!-- Cart Box End -->
                                                <!-- Cart Box Start -->
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img/products/2.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Round Neck</a></h6>
                                                        <span class="cart-price">45.00</span>
                                                        <span>Size: XL</span>
                                                        <span>Color: Green</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div>
                                                <!-- Cart Box End -->
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer">
                                                   <ul class="price-content">
                                                       <li>Subtotal <span>$57.95</span></li>
                                                       <li>Shipping <span>$7.00</span></li>
                                                       <li>Taxes <span>$0.00</span></li>
                                                       <li>Total <span>$64.95</span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        <a class="cart-checkout" href="checkout.html">Checkout</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Wish</span><span>list (0)</span></span></a>
                                    </li>
                                    <li><a href="#"><i class="lnr lnr-user"></i><span class="my-cart"><span> <strong>Sign in</strong> Or</span><span> Join My Site</span></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Cart Box End Here -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Middle End Here -->
            <!-- Header Bottom Start Here -->
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                         <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                            <span class="categorie-title">Categories </span>
                        </div>                       
                        <div class="col-xl-9 col-lg-8 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                  @foreach ($category_pack as $item )
                                  <li><a href="">  Pack {{ $item['title'] }}</a></li>
                                  @endforeach
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        @foreach ($category_pack as $item )
                                        <li><a href="">  Pack {{ $item['title'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">Categories</span>
                    <nav>  
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                                @foreach ($category as $item )
                                    @if ( $item->sous_categories->count()>0)
                                    <li class="has-sub">
                                        <a href="#">{{ $item['title'] }} </a>
                                        <ul class="category-sub">
                                            @foreach ( $item['sous_categories'] as $sousCat )
                                            <li class="has-sub"><a href="shop.html">{{$sousCat['title']}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="#">{{ $item['title'] }}</a> </li>

                                    @endif
                                @endforeach                        
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </nav>
                </div>
            </div>
            <!-- Mobile Vertical Menu Start End -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Categorie Menu & Slider Area Start Here -->
        <div class="main-page-banner pb-50 off-white-bg">
            <div class="container">
                <div class="row">
                    <!-- Vertical Menu Start Here -->
                    <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                        <div class="vertical-menu mb-all-30">
                            <nav>
                                <ul class="vertical-menu-list">
                                   @foreach ( $category as $item )
                                       @if ($item->sous_categories->count()>0)
                                       <li><a href="shop.html">{{ $item['title'] }}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <!-- Vertical Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu megamenu-two">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    @foreach ( $item['sous_categories'] as $sousCat )
                                                    <li class="has-sub"><a href="shop.html">{{$sousCat['title']}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- Vertical Mega-Menu End --> 
                                    </li>
                                       @else
                                       <li><a href=""><i class="fa fa-shop"></i>{{ $item['title'] }}</a>
                                       </li>
                                       @endif
                                   @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Vertical Menu End Here -->
                    <!-- Slider Area Start Here -->
                    <div class="col-xl-9 col-lg-8 slider_box">
                        <div class="slider-wrapper theme-default">
                            <!-- Slider Background  Image Start-->
                            <div id="slider" class="nivoSlider">
                                <a href="shop.html"><img src="img/slider/1.jpg" data-thumb="img/slider/1.jpg" alt="" title="#htmlcaption" /></a>
                                <a href="shop.html"><img src="img/slider/2.jpg" data-thumb="img/slider/2.jpg" alt="" title="#htmlcaption2" /></a>
                            </div>
                            <!-- Slider Background  Image Start-->
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Categorie Menu & Slider Area End Here -->
        <!-- Brand Banner Area Start Here -->
        <div class="big-banner py-2 pb-sm-60">
            <div class="container big-banner-box">
                @foreach ($pack as $item)
                <div class="col-img">
                    <a href="#">
                    <img src="{{ asset($item->getFirstMediaUrl('image')) }}" height="250px" max-width="300px" style="object-fit:contain" alt="">
                    </a> 
                </div>
                @endforeach
              
               
            </div>
            <!-- Container End -->
        </div>
        <!-- Brand Banner Area End Here -->
        <!-- Hot Deal Products Start Here -->
        <div class="hot-deal-products off-white-bg pb-10 pb-sm-10">
            <div class="container">

                @foreach ($section as $item)
                    @if ($item->produits()->count() >0 )
                        
                   
               <div class="post-title pb-30">
                   <h2>{{ $item['title'] }}</h2>
               </div>
              
                <div class="hot-deal-active owl-carousel">
                        @foreach ( $item['produits'] as $item )
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="product.html">
                                    <img class="primary-img" src="{{ asset($item->getFirstMediaUrl('image')) }}" style="max-width:100%; height:150px; object-fit:contain; " alt="single-product">
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info text-center">
                                    <h4><a href="product.html">{{ $item['title'] }}</a></h4>
                                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                                </div>
                                <div class="pro-actions">
                                    <div class="actions-primary mt-5">
                                        <a href="cart.html" title=""> + Ajouter au panier</a>
                                    </div>
                                    {{-- <div class="actions-secondary">
                                        <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                        <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                        @endforeach
                  

                    
                </div>
                @endif
             
                @endforeach


            </div>
            <!-- Container End -->
        </div>
        <!-- Hot Deal Products End Here -->
        <!-- Hot Deal Products End Here -->

       
     
     
        <div class="big-banner pb-100 pb-sm-60">
            <div class="container big-banner-box">
                <div class="col-img">
                    <a href="#">
                    <img src="img/banner/5.jpg" alt="">
                    </a>
                </div>
                <div class="col-img">
                    <a href="#">
                    <img src="img/banner/h1-banner3.jpg" alt="">
                    </a>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area Start Here -->
        <div class="support-area bdr-top">
            <div class="container">
                <div class="d-flex flex-wrap text-center">
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-gift"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Great Value</h6>
                            <span>Nunc id ante quis tellus faucibus dictum in eget.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                            <i class="lnr lnr-rocket" ></i>
                        </div>
                        <div class="support-desc">
                            <h6>Worlwide Delivery</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-lock"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Safe Payment</h6>
                            <span>Duis suscipit elit sem, sed mattis tellus accumsan.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-enter-down"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Shop Confidence</h6>
                            <span>Faucibus dictum suscipit eget metus. Duis  elit sem, sed.</span>
                        </div>
                    </div>
                    <div class="single-support">
                        <div class="support-icon">
                           <i class="lnr lnr-users"></i>
                        </div>
                        <div class="support-desc">
                            <h6>24/7 Help Center</h6>
                            <span>Quisque posuere enim augue, in rhoncus diam dictum non.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area End Here -->
        <!-- Footer Area Start Here -->
        <footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <!-- Signup Newsletter Start -->
                    <div class="row mb-60">
                         <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                            <div class="news-desc text-center mb-30">
                                 <h3>Sign Up For Newsletters</h3>
                                 <p>Be the First to Know. Sign up for newsletter today</p>
                             </div>
                             <div class="newsletter-box">
                                 <form action="#">
                                      <input class="subscribe" placeholder="your email address" name="email" id="subscribe" type="text">
                                      <button type="submit" class="submit">subscribe!</button>
                                 </form>
                             </div>
                         </div>
                    </div> 
                    <!-- Signup-Newsletter End -->                   
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Information</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="contact.html">Terms & Conditions</a></li>
                                        <li><a href="login.html">FAQs</a></li>
                                        <li><a href="login.html">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Customer Service</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="#">Site Map</a></li>
                                        <li><a href="#">Gift Certificates</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Extras</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="#">Brands</a></li>
                                        <li><a href="#">Gift Certificates</a></li>
                                        <li><a href="#">Affiliate</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Site Map</a></li>      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list address-content">
                                        <li><i class="lnr lnr-map-marker"></i> Address: 169-C, Technohub, Dubai Silicon Oasis.</li>
                                        <li><i class="lnr lnr-envelope"></i><a href="#"> mail Us: Support@truemart.com </a></li>
                                        <li>
                                            <i class="lnr lnr-phone-handset"></i> Phone: (+800) 123 456 789)
                                        </li>
                                    </ul>
                                    <div class="payment mt-25 bdr-top pt-30">
                                        <a href="#"><img class="img" src="img/payment/1.png" alt="payment-image"></a>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Middle Start -->
            <div class="footer-middle text-center">
                <div class="container">
                    <div class="footer-middle-content pt-20 pb-30">
                            <ul class="social-footer">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><img src="img/icon/social-img1.png" alt="google play"></a></li>
                                <li><a href="#"><img src="img/icon/social-img2.png" alt="app store"></a></li>
                            </ul>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom pb-30">
                <div class="container">

                     <div class="copyright-text text-center">                    
                        <p>Copyright © 2018 <a target="_blank" href="#">Truemart</a> All Rights Reserved.</p>
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer Area End Here -->
     
    </div>
    <!-- Main Wrapper End Here -->

    <!-- jquery 3.2.1 -->
    <script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Countdown js -->
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <!-- Mobile menu js -->
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <!-- ScrollUp js -->
    <script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
    <!-- Nivo slider js -->
    <script src="{{ asset('js/jquery.nivo.slider.js') }}"></script>
    <!-- Fancybox js -->
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <!-- Jquery nice select js -->
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <!-- Jquery ui price slider js -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- Bootstrap popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugin js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Main activaion js -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>