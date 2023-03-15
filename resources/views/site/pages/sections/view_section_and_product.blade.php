<div class="hot-deal-products off-white-bg pb-10 pb-sm-10">
    <div class="container">

        @foreach ($section as $item)
          
{{-- affichage des publicite --}}

<div class="image-banner pb-1 off-white-bg">
    <div class="container banner owl-carousel owl-theme"  style="padding-left:0; padding-right:0">
        @foreach ($item['publicites'] as $item)
        <div class="col-img item">
            @foreach ($item->getMedia('image') as $item)
            <a href="{{ route('boutique') }}"><img src="{{ asset($item->getUrl()) }}" data-thumb="{{ asset($item->getUrl()) }}" alt="" title="#htmlcaption" width="100%" style=" object-fit:contain" /></a>
            @endforeach
        </div>
        @endforeach        
    </div>
</div>
      
{{-- end  affichage des publicite --}}


   @if ($item['produits'] !==null)
       
   <div class="container" style="background: #f28b00">
    <div class="row">
        <div class=" col-lg-6 col-md-12   py-3" >
            <a href="/boutique?section={{ $item['code'] }}" class="" style=" color: #fff;
            font-size: 21px;
            font-weight: 500;
           float:left;
          "
           > 
               <span class="sectionTitle" style=" text-transform:capitalize"> <i class="fa fa-tags"></i> {{ $item['title'] }} </span>
            </a>
               
        </div>
        <div class="col-lg-6 col-md-12  ">
            <a href="/boutique?section={{ $item['code'] }}"  style="color: white; float:right; margin-right:100px;line-height:3">
                <span class="voirPlus text-dark" style=" font-weight: 600;"><i class="fa fa-plus"></i> Voir Tout</span>
            </a>
        </div>
        
    </div>

  </div>
  
  
  @if ($item['title'] != 'Decouvrez')
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
                    <p><span class="price">{{ number_format($item['prix'],0) }} FCFA</span></p>
                    @endif
            </div>
            <div class="pro-actions">
                <div class="actions-primary mt-5">
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
    @endforeach
</div>

@elseif ($item['title'] == 'Decouvrez')

<div class="container">
    <div class="row">
                @foreach ( $item['produits']->take(16) as $item )
                <div class="col-md-6 col-lg-3 col-sm-6 col-6" style="padding-left:0; padding-right:0;">
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
                                    <p><span class="price">{{ number_format($item['prix'],0) }} FCFA</span></p>
                                    @endif
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary mt-5">
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
                @endforeach
            </div>
        </div>
  @endif
   
   @endif
    
        @endforeach

        
    </div>
    <!-- Container End -->
    @include('site.partials.script_add_to_cart')

    <script type="text/javascript">
       $(function() {

        $('.banner').owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        dots: false,
        navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"],
        smartSpeed: 1200,
        margin: 5,
        animateOut:'fadeOut',
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 1000
            },
            380: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
  // Owl Carousel
  
 
});



    </script>
</div>