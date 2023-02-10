<div class="hot-deal-products off-white-bg pb-10 pb-sm-10">
    <div class="container">

        @foreach ($section as $item)
            @if ($item->produits()->count() >0 )
                
           
       <div class="post-title col-12 pb-30 ">
           <h2 class="">{{ $item['title'] }}
            <a href="/boutique?section={{ $item['code'] }}" class="text-right col-10 text-white"> <small>Voir plus <i class="fa fa-arrow-right"></i></small></a>
        </h2>
        
        <div>
        </div>
       </div>
      
        <div class="hot-deal-active owl-carousel">
                @foreach ( $item['produits'] as $item )
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
                                <a href="" title=""> <i class="fa fa-eye"></i> Aperçu</a>
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