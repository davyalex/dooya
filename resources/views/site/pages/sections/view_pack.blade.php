<div class="support-area bdr-top">
    <div class="container mb-1">
        <div class="d-flex flex-wrap">
            @foreach ($pack as $item)
            <div class="single-support ">
             
               @foreach ($item['produits'] as $item)
                   
              
                <div class="support-icon ">
                    <a href="/detail?produit={{ $item['code'] }}">
                        <img src="{{ asset($item->getFirstMediaUrl('image')) }}" height="200px" width="100%" style="object-fit:cover;" alt="">
                    </a> 
                </div>
                <div class="support-desc text-center">
                    <h6 class="text-uppercase">{{ $item['title']}} </h6>
                 
                    @if ($item['prix_promo'] >0)
                    <span style=" color: #d60c0c;
                    font-size: 21px;
                    font-weight: 900;">{{ number_format($item['prix_promo'],0) }} FCFA</span> 
                    <del class="prev-price">{{ number_format($item['prix'],0) }} FCFA</del>              
                    @else
                    <span style=" color: #d60c0c;
                    font-size: 21px;
                    font-weight: 900;">{{ number_format($item['prix'],0) }} FCFA</span>
                    @endif
                </div>

                @endforeach
                
                
            </div>
            @endforeach
     
         
        </div>
    </div>
    <!-- Container End -->
</div>