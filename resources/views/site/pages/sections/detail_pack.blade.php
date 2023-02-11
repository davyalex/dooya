
<!-- Breadcrumb End -->
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">

             

              <div class="col-lg-5 mb-all-40">
                <!-- Thumbnail Large Image start -->
                <div class="tab-content">
                    <div id="thumb1" class="tab-pane fade show active">
                        <a data-fancybox="images" href="{{ asset($pack->getFirstMediaUrl('image'))  }}"><img src="{{ asset($pack->getFirstMediaUrl('image'))  }}" alt="product-view"></a>
                    </div>
                        @foreach ($pack->getMedia('image') as $key=>$item )
                        <div id="thumb{{ ++$key }}" class="tab-pane fade">
                            <a data-fancybox="images" href="{{ $item->getUrl() }}"><img src="{{ $item->getUrl() }}" alt="product-view"></a>
                        </div>
                        @endforeach
                    
                  
                </div>
                <!-- Thumbnail Large Image End -->
                <!-- Thumbnail Image End -->
                <div class="product-thumbnail mt-15">
                    <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                        <a class="active" data-toggle="tab" href="#thumb1"><img src="{{ asset($pack->getFirstMediaUrl('image')) }}" alt="product-thumbnail"></a>
                        @foreach ($pack->getMedia('image') as $key=>$item )
                        <a data-toggle="tab" href="#thumb{{ ++$key }}"><img src="{{ $item->getUrl() }}" alt="product-thumbnail"></a>
                        @endforeach
                      
                    </div>
                </div>
                <!-- Thumbnail image end -->
            </div>
            





                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{ $pack['title'] }}</h3>
                        <div class="rating-summary fix mtb-10">
                        </div>
                        <div class="pro-price mtb-30">
                            
                            <p class="d-flex align-items-center">
                                @if ($pack['prix_promo'] >0)
                                <span class="prev-price">{{ $pack['prix'] }} FCFA</span>
                                <span class="price">{{ $pack['prix_promo'] }} FCFA</span>
                                <span class="saving-price">
                                    {{ number_format(($pack ->prix - $pack ->prix_promo ) * 100 / $pack ->prix, 0) }}
                                %</span></p>
                                @else
                                <span class="price">{{ $pack['prix'] }} FCFA</span>

                                @endif
                                
                        </div>
                        <p class="mb-20 pro-desc-details"> {!! $pack['description'] !!}</p>
                          
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
                        <div class="box-quantity d-flex hot-product2 mt-3">
                            <form action="#">
                                <input class="quantity mr-15" type="number" min="1" value="1">
                            </form>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" title="" data-original-title="Add to Cart"> + Ajouter au panier</a>
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
                    <li><a data-toggle="tab" href="#review">Commentaires</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        <p>{!! $pack['description'] !!}</p>
                    </div>
                    <div id="review" class="tab-pane fade">
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
                    </div>
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


<!-- Realated Products End Here -->