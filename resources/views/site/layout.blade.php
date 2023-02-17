  
  
  
  
  
  
  
  
  
  <!doctype html>
  <html class="no-js" lang="fr">
  
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">

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
      <script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"></script>
     
  </head>
  
  <body>
  
      <!-- Main Wrapper Start Here -->
      <div class="wrapper">
          <!-- Banner Popup Start -->
          {{-- <div class="popup_banner">
              <span class="popup_off_banner">×</span>
              <div class="banner_popup_area">
                      <img src="img/banner/pop-banner.jpg" alt="">
              </div>
          </div> --}}
          <!-- Banner Popup End -->
         <!-- Newsletter Popup Start -->
          {{-- <div class="popup_wrapper">
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
          </div> --}}
          <!-- Newsletter Popup End -->
          <!-- Main Header Area Start Here -->
          <header>
              <!-- Header Top Start Here -->
              {{-- <div class="header-top-area">
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
              </div> --}}
              <!-- Header Top End Here -->
              <!-- Header Middle Start Here -->
              <div class="header-middle ptb-15 header-sticky">
                  <div class="container">
                      <div class="row align-items-center no-gutters ">
                          <div class="col-lg-3 col-md-4">
                              <div class="logo ">
                                  <a href="{{ route('accueil') }}"><img src="{{ asset('img/logo/logo_site.jpg') }}" width="70px" alt="logo-image"></a>
                              </div>
                          </div>
                          <!-- Categorie Search Box Start Here -->
                          <div class="col-lg-5 col-md-4">
                              <div class="categorie-search-box">
                                  <form action="{{ route('search') }}" method="GET">
                                        @csrf
                                      <input type="text" name="search" placeholder="Rechercher un produit">
                                      <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                                  </form>
                              </div>
                          </div>
                          <!-- Categorie Search Box End Here -->
                          <!-- Cart Box Start Here -->
                          <div class="col-lg-4 col-md-4">
                              <div class="cart-box mt-2" >
                                  <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                    @include('site.pages.sections.cart')
  
  
                                      
                                      @auth
                                    
                                      
                                       
                                     
                                      <li><a href="#"  class="dropdown-toggle"   data-toggle="dropdown"  role="button" ><i class="lnr lnr-user"></i><span class="my-cart"><span>{{ Auth::user()->name }}</span><span>mon compte</span></span>
                                        <div class="dropdown-menu">
                                            <button id="commande" style="color:rgb(81, 77, 77)" class="dropdown-item" type="button"> <i class="fa fa-shopping-bag"></i> Mes commandes</button>
                                            <div class="dropdown-divider"></div>
                                            <button id="profil" style="color:rgb(81, 77, 77)" class="dropdown-item" type="button"><i class="fa fa-user"></i> Mon profil</button>
                                          @role(['administrateur','webmaster'])
                                          <div class="dropdown-divider"></div>
                                          <button style="color:rgb(81, 77, 77)" class="dropdown-item" type="button" id="dashboard"><i class="fa fa-dashboard"></i> Dashboard</button>  
                                         
                                          @endrole
                                            <div class="dropdown-divider"></div>
                                            <button style="color:rgb(81, 77, 77)" class="dropdown-item" type="button" id="signout"><i class="fa fa-sign-out"></i>Deconnexion</button>  

                                        </div>
                                    </a>
                                
                                    </li>
                                                                          
                                      <form id="form_logout" action="{{ route('logout-user') }}" method="POST">
                                        @csrf
                                    </form>
                                      @endauth
                                      @guest
                                      <li><a href="{{ route('login-user') }}"><i class="lnr lnr-user"></i><span class="my-cart">Creer un compte<span> <strong>Se connecter</strong></a>
                                      </li>
                                      @endguest
                                    
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
              <div class="header-bottom" style="  border-bottom: 1px solid #ebebeb;
              border-top: 1px solid #ebebeb;">
                  <div class="container">
                      <div class="row align-items-center">
                           <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                              <span class="categorie-title">Categories </span>
                          </div>                       
                          <div class="col-xl-9 col-lg-8 col-md-12">
                              <nav class="d-none d-lg-block text-center">
                                  <ul class="header-bottom-list d-flex">
                                    @foreach ($category_pack as $item )
                                    <li><a href="/detail?pack={{ $item['code'] }}">  Pack {{ $item['title'] }}</a></li>
                                    @endforeach
                                  </ul>
                              </nav>
                              <div class="mobile-menu d-block d-lg-none">
                                  <nav>
                                      <ul>
                                          @foreach ($category_pack as $item )
                                          <li><a href="/detail?pack={{ $item['code'] }}">  Pack {{ $item['title'] }}</a></li>
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
                                              <li><a href="/boutique?sous_category={{ $sousCat['code'] }}">{{$sousCat['title']}}</a>
                                              </li>
                                              @endforeach
                                          </ul>
                                      </li>
                                      @else
                                      <li><a href="/boutique?category={{ $item['code'] }}">{{ $item['title'] }}</a> </li>
  
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
          <div class="main-page-banner">
              <div class="container">
                  <div class="row">
                      <!-- Vertical Menu Start Here -->
                      <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                          <div class="vertical-menu mb-all-30">
                              <nav>
                                  <ul class="vertical-menu-list">
                                     @foreach ( $category as $item )
                                         @if ($item->sous_categories->count()>0)
                                         <li><a href="/boutique?category={{ $item['code'] }}">{{ $item['title'] }}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                          <!-- Vertical Mega-Menu Start -->
                                          <ul class="ht-dropdown megamenu megamenu-two">
                                              <!-- Single Column Start -->
                                              <li class="single-megamenu">
                                                  <ul>
                                                      @foreach ( $item['sous_categories'] as $sousCat )
                                                      <li class="has-sub"><a href="/boutique?sous_category={{ $sousCat['code'] }}">{{$sousCat['title']}}</a>
                                                      </li>
                                                      @endforeach
                                                  </ul>
                                              </li>
                                              <!-- Single Column End -->
                                          </ul>
                                          <!-- Vertical Mega-Menu End --> 
                                      </li>
                                         @else
                                         <li> <i class="fa fa-shopping-cart"></i> <a href="/boutique?category={{ $item['code'] }}"><i class="fa fa-shop"></i>{{ $item['title'] }}</a>
                                         </li>
                                         @endif
                                     @endforeach
                                     <li><a href="{{ route('boutique') }}" style="font-weight: 700">Tous les produits <i class="fa fa-shopping-cart"></i></a></li>
                                  </ul>

                             
                              </nav>
                          </div>
                      </div>
                      <!-- Vertical Menu End Here -->
                      <!-- Slider Area Start Here -->
                      @if (Route::currentRouteName()=='accueil')
                      @include('site.pages.sections.slider')
                      @endif
                      <!-- Slider Area End Here -->
                  </div>
                  <!-- Row End -->
              </div>
              <!-- Container End -->
          </div>
          <!-- Categorie Menu & Slider Area End Here -->
          <!-- Brand Banner Area Start Here -->
  
  
  
  
  
  @yield('content')
  
  

  
  <!-- Banner pub -->
  {{-- <div class="big-banner pb-100 pb-sm-60">
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
</div> --}}


<!-- Support Area Start Here -->
{{-- <div class="support-area bdr-top">
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
</div> --}}
<!-- Support Area End Here -->
<!-- Footer Area Start Here -->
<footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
    <!-- Footer Top Start -->
    <div class="footer-top">
        <div class="container">
                   
            <div class="row">
                <!-- Single Footer Start -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">A propos</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">Presentation</a></li>
                                <li><a href="#">Politique de Confidentialité</a></li>
                                <li><a href="#">Conditions générales de vente</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Service client</h3>
                        <div class="footer-content">
                          
                            <ul class="footer-list">
                                <li><a href="#"> Comment ça marche ?</a></li>
                                <li><a href="#">Expédition et livraison</a></li>
                                <li><a href="#">Retours et remboursements
                                </a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Nos packs</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                               @foreach ($category_pack as $item )
                               <li><a href="/detail?pack={{ $item['code'] }}">{{ $item['title'] }}</a></li>      

                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                {{-- <div class="col-lg-2 col-md-4 col-sm-6">
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
                </div> --}}
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Nous contactez</h3>
                        <div class="footer-content">
                            <ul class="footer-list address-content">
                                <li><i class="lnr lnr-map-marker"></i> Adresse: Abidjan ,cocody 2plateaux dokui.</li>
                                <li><i class="lnr lnr-envelope"></i><a href="#"> Email Support@dooya.com </a></li>
                                <li>
                                    <i class="lnr lnr-phone-handset"></i> Phone: (+225) 0000000000
                                </li>
                            </ul>
                                                          
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
 
    <!-- Footer Middle End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom pb-30">
        <div class="container">

             <div class="copyright-text text-center">                    
                <p>Copyright © 2023 Dooya</a> Tous droits reservés.</p>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="text/javascript">
                                   
                                       
    $(document).ready(function () {
//cacher le menu vertical sur les autres page
var url = {{ Js::from(Route::currentRouteName()==='accueil') }}
if (url ===false) {
    $('.vertical-menu-list').hide();
}

//logout

$('#signout').click(function (e) { 
    
    e.preventDefault();
    document.getElementById('form_logout').submit();

});

//aller sur la page mes commandes
$('#commande').click(function (e) { 
    e.preventDefault();
    window.location.href="{{ route('commande-user') }}"

});

//page profil
$('#profil').click(function (e) { 
    e.preventDefault();
    window.location.href="{{ route('profil-user') }}"

});

//page profil
$('#dashboard').click(function (e) { 
    e.preventDefault();
    window.location.href="{{ route('dashboard') }}"

});


});
       
</script>
@include('sweetalert::alert')

</body>

</html>