@extends('site.layout')
@section('title','Boutique')

@section('content')
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="active"><a href="{{ route('boutique') }}">@yield('title')</a></li>
                @if (request('category'))
                <li class="active"><a href="">{{ $req_catGet['title'] }}</a></li>
                @elseif (request('sous_category'))  
                <li class="active"><a href="">{{ $req_sousCatGet['categorie']['title'] }}</a></li>
                <li class="active"><a href="">{{ $req_sousCatGet['title'] }}</a></li>
                @elseif (request('section'))  
                <li class="active"><a href="">{{ $req_sectionGet['title'] }}</a></li>
                
                @endif

            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Shop Page Start -->
<div class="main-shop-page pt-0 pb-100 ">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <!-- Sidebar Shopping Option Start -->

            {{-- <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar">
                    <!-- Sidebar Electronics Categorie Start -->
                    <div class="electronics mb-40">
                        <h3 class="sidebar-title">Categories</h3>
                        <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                            <ul>
                                <li class="has-sub"><a href="#">Camera</a>
                                    <ul class="category-sub">
                                        <li><a href="shop.html">Cords and Cables</a></li>
                                        <li><a href="shop.html">gps accessories</a></li>
                                        <li><a href="shop.html">Microphones</a></li>
                                        <li><a href="shop.html">Wireless Transmitters</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li><a href="shop.html">Wireless Transmitters</a></li>

                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </div>
                   
                   
                    
                  
                   
                  
                  
                    <!-- Product Top End -->                            
                    <!-- Single Banner Start -->
                    <div class="col-img">
                        <a href="shop.html"><img src="img/banner/banner-sidebar.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div> --}}


            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-12 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                  
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Sort By:</label>
                            <select class="sorter wide">
                                <option value="Position">Relevance</option>
                                <option value="Product Name">Neme, A to Z</option>
                                <option value="Product Name">Neme, Z to A</option>
                                <option value="Price">Price low to heigh</option>
                                <option value="Price" selected>Price heigh to low</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Show:</label>
                            <select class="sorter wide">
                                <option value="12">12</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        <div id="grid-view" class="tab-pane fade show active">
                            <div class="row">
                                <!-- Single Product Start -->
                                @foreach ($produit as $item )
                                <div class="col-lg-3 col-md-4 col-sm-3 col-6">
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="/detail?produit={{ $item['code'] }}">
                                                <img class="primary-img" src="{{ asset($item->getFirstMediaUrl('image')) }}" width="100%" height="200px" style=" object-fit:contain" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="pro-info text-center">
                                                <h4><a href="product.html">{{ $item['title'] }}</a></h4>
                                                    @if ($item['prix_promo'] >0)
                                                    <p><span class="price">{{ $item['prix_promo'] }} FCFA</span><del class="prev-price">{{ $item['prix'] }} FCFA</del></p>
                                                    <div class="label-product l_sale">
                                                        {{ number_format(($item ->prix - $item ->prix_promo ) * 100 / $item ->prix, 0) }}
                                                        <span class="symbol-percent">%</span></div>
                                                    @else
                                                    <p><span class="price">{{ $item['prix'] }} FCFA</span></p>
                                                    @endif
                                            </div>
                                            <div class="pro-actions">
                                                <div class="actions-primary mt-5">
                                                    {{-- <a href="/detail?produit={{ $item['code'] }}" title=""> <i class="fa fa-shopping-cart"></i> Acheter</a> --}}
                                                    <a href="" class="addCart" data-id="{{ $item['id']}}" title="" data-original-title=""><i class="fa fa-shopping-cart"></i> Acheter</a>

                                                </div>
                                                {{-- <div class="actions-secondary">
                                                    <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                                    <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                                
                            </div>
                            <!-- Row End -->
                        </div>
                       
                        <!-- #list view End -->
                        <div class="pro-pagination">
                            {!! $produit->appends(request()->query())->links('vendor.pagination.custom') !!}

                        </div>
                        <!-- Product Pagination Info -->
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
@include('site.partials.script_add_to_cart')
@endsection