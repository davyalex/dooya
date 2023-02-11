
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }}-Dashboard-@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="@yield('title')">
  <meta property="og:image" content="@yield('image')">
  <meta name="title" content="@yield('title')">
  <meta name="url" content="@yield('url')">


  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('assets_admin/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets_admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" type="text/css" 
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('resources/js/app.js') }}" defer></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- Vendor CSS Files -->
  <link href="{{ asset('assets_admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets_admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/css/file-upload-with-preview.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_admin/css/bootstrap-select.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets_admin/css/select2.min.css') }}" rel="stylesheet">


  <script src="{{ asset('assets_admin/js/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
  {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

  




  
</head>
<body>

  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo/logo_site.jpg') }}" width="auto" height="auto" alt="">
        <span class="d-none d-lg-block" style="color: orange">{{ config('app.name') }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets_admin/img/avatar.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->roles[0]->name }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profil',Auth::user()->code) }}">
                <i class="bi bi-person"></i>
                <span>Mon profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>

              <form id="form_logout" action="{{ route('logout') }}" method="POST">
                  @csrf
              </form>
              <a class="dropdown-item d-flex align-items-center" href=""  onclick="event.preventDefault();
              document.getElementById('form_logout').submit();
              ">
                <i class="bi bi-box-arrow-right"></i>
                <span>Deconnexion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

           {{-- category --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-text"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('category') }}">
              <i class="bi bi-circle"></i><span>Categories principales</span>
            </a>
          </li>
          <li>
            <a href="{{ route('sous_category') }}">
              <i class="bi bi-circle"></i><span>Sous categories</span>
            </a>
          </li>
        </ul>
      </li><!-- End category Nav -->
    
     {{-- produit --}}
     <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#produit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-cart-plus"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="produit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('section') }}">
            <i class="bi bi-circle"></i><span>Ajouter une section</span>
          </a>
        </li>
        <li>
          <a href="{{ route('produit') }}">
            <i class="bi bi-circle"></i><span>Ajouter un produit</span>
          </a>
        </li>
      </ul>
    </li><!-- End produit Nav -->
  

      {{-- Pack --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pack-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-shop"></i><span>Packs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pack-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('category_pack') }}">
              <i class="bi bi-circle"></i><span>Categorie des packs</span>
            </a>
          </li>
          <li>
            <a href="{{ route('pack') }}">
              <i class="bi bi-circle"></i><span>Packs</span>
            </a>
          </li>
        </ul>
      </li><!-- End pack Nav -->



       {{-- Commande --}}
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#commande-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="commande-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Commandes en attente</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Commandes Livrées</span>
            </a>
          </li>

          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>Toutes les commandes</span>
            </a>
          </li>
        </ul>
      </li><!-- End commande Nav -->
    
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('livraison') }}">
                <i class="bi bi-bicycle"></i>
                <span>Livraisons</span>
            </a>
        </li><!-- End livraison Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('user') }}">
            <i class="bi bi-people-fill"></i>
            <span>Utilisateurs</span>
          </a>
        </li><!-- End user Page Nav -->

           {{-- category --}}
           <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#parametre-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-tools"></i><span>Parametre</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="parametre-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Slider</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="bi bi-circle"></i><span>Publicité</span>
                </a>
              </li>
            </ul>
          </li><!-- End category Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    {{-- breadcrum --}}
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">@yield('title')</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

@yield('content')
@include('sweetalert::alert')


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>{{ config('app.name') }}</span></strong>. Tous droits reservés
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Crée par <a href="">Labodigit</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
{{-- <script src="{{ asset('assets_admin/js/bootstrap.min.js') }}"></script> --}}
  <script src="{{ asset('assets_admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets_admin/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets_admin/js/main.js') }}"></script>
  <script src="{{ asset('assets_admin/js/file-upload-with-preview.min.js') }}"></script>
  <script src="{{ asset('assets_admin/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('assets_admin/js/bootstrap-multiselect.min.js') }}"></script>
  <script src="{{ asset('assets_admin/js/custom-select2.js') }}"></script>
  <script src="{{ asset('assets_admin/js/select2.min.js') }}"></script>




<script>
  @if(Session::has('message'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true,
      "timeOut": "1000",

  }
          toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true,
      "timeOut": "10000",
  }
          toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true
  }
          toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true
  }
          toastr.warning("{{ session('warning') }}");
  @endif



</script>

{{-- toastr.options = {
"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": true,
"positionClass": "toast-top-right",
"preventDuplicates": true,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
} --}}
 

</body>

</html>