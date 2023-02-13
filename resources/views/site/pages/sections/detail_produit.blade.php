
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">

             

              <div class="col-lg-5 mb-all-40">
                <!-- Thumbnail Large Image start -->
                <div class="tab-content">
                    <div id="thumb1" class="tab-pane fade show active">
                        <a data-fancybox="images" href="{{ asset($produit->getFirstMediaUrl('image'))  }}"><img src="{{ asset($produit->getFirstMediaUrl('image'))  }}" alt="product-view"></a>
                    </div>
                        @foreach ($produit->getMedia('image') as $key=>$item )
                        <div id="thumb{{ ++$key }}" class="tab-pane fade">
                            <a data-fancybox="images" href="{{ $item->getUrl() }}"><img src="{{ $item->getUrl() }}" alt="product-view"></a>
                        </div>
                        @endforeach
                    
                  
                </div>
                <!-- Thumbnail Large Image End -->
                <!-- Thumbnail Image End -->
                <div class="product-thumbnail mt-15">
                    <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                        {{-- <a class="active" data-toggle="tab" href="#thumb1"><img src="{{ asset($produit->getFirstMediaUrl('image')) }}" alt="product-thumbnail"></a> --}}
                        @foreach ($produit->getMedia('image') as $key=>$item )
                        <a data-toggle="tab" href="#thumb{{ ++$key }}"><img src="{{ $item->getUrl() }}" alt="product-thumbnail"></a>
                        @endforeach
                      
                    </div>
                </div>
                <!-- Thumbnail image end -->
            </div>
            





                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{ $produit['title'] }}</h3>
                        @if ($produit['category_pack'])
                        <strong><i class="fa fa-dropbox"></i> Pack {{ $produit['category_pack']['title'] }}
                        </strong>
                        @endif

                        <div class="rating-summary fix mtb-10">
                        </div>
                        <div class="pro-price mtb-30">
                            
                            <p class="d-flex align-items-center">
                                @if ($produit['prix_promo'] >0)
                                <span class="prev-price">{{ $produit['prix'] }} FCFA</span>
                                <span class="price">{{ $produit['prix_promo'] }} FCFA</span>
                                <span class="saving-price">
                                    {{ number_format(($produit ->prix - $produit ->prix_promo ) * 100 / $produit ->prix, 0) }}
                                %</span></p>
                                @else
                                <span class="price">{{ $produit['prix'] }} FCFA</span>

                                @endif
                                
                        </div>
                        <p class="mb-20 pro-desc-details"> {!! $produit['description'] !!}</p>
                          
                        {{-- <div class="product-size mb-20 clearfix">
                            <label>Size</label>
                            <select class="">
                              <option>S</option>
                              <option>M</option>
                              <option>L</option>
                            </select>
                        </div> --}}
                        {{-- <div class="color clearfix mb-20">
                            <label>color</label>
                            <ul class="color-list">
                                <li>
                                    <a class="orange active" href="#"></a>
                                </li>
                                <li>
                                    <a class="paste" href="#"></a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="box-quantity d-flex hot-product2">
                            {{-- <form action="#">
                                <input class="quantity mr-15" type="number" min="1" value="1">
                            </form> --}}
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="" class="addCart" data-id="{{ $produit['id']}}" title="" data-original-title=""> + Ajouter au panier</a>
                                </div>
                                {{-- <div class="actions-secondary">
                                    <a href="compare.html" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                                    <a href="wishlist.html" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="pro-ref mt-20">
                            <p><span class="in-stock"><i class="ion-checkmark-round"></i> EN STOCK</span></p>
                        </div>
                      
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-100 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav tabs-area" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#dtail">Description du produit</a></li>
                    {{-- <li><a data-toggle="tab" href="#review">Commentaires</a></li> --}}
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        <p>{!! $produit['description'] !!}</p>
                    </div>
                    {{-- <div id="review" class="tab-pane fade">
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding">
                            <div class="group-title">
                                <h2>Commentaires</h2>
                            </div>
                            <h4 class="review-mini-title">Truemart</h4>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Quality</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Truemart</label>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>price</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Review by <a href="https://themeforest.net/user/hastech">Truemart</a></label>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>value</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <label>Posted on 7/20/18</label>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <h2 class="review-title mb-30">You're reviewing: <br><span>Faded Short Sleeves T-shirt</span></h2>
                            <p class="review-mini-title">your rating</p>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Quality</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>price</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>value</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                <form autocomplete="off" action="#">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">Nickname</label>
                                        <input type="text" class="form-control" id="sure-name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="subject">Summary</label>
                                        <input type="text" class="form-control" id="subject" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">Review</label>
                                        <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                    </div>
                                    <button type="submit" class="customer-btn">Submit Review</button>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div> --}}
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Realted Products Start Here -->

@if ($produit_related->count() >0)
<div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
    <div class="container">
       <!-- Product Title Start -->
       <div class="post-title pb-30">
           <h2>Produits Similaires</h2>
       </div>
       <!-- Product Title End -->
       

       <div class="hot-deal-active owl-carousel">
        @foreach ( $produit_related as $item )
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
                    <h4><a href="/detail?produit={{ $item['code'] }}">{{ $item['title'] }}</a></h4>
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
                        <a href="" class="addCart" data-id="{{ $item['id']}}" title="" data-original-title=""> <i class="fa fa-shopping-cart"></i> Acheter</a>
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
        </div>                
        <!-- Hot Deal Product Active End -->

    </div>
@endif

    <!-- Container End -->
</div>
<!-- Realated Products End Here -->

@include('site.partials.script_add_to_cart')