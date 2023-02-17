<div class="support-area bdr-top">
    <div class="container mb-1">
        <div class="d-flex flex-wrap text-center">
            @foreach ($pack as $item)
            <div class="single-support">
             
               
                <div class="support-icon ">
                    <a href="/detail?produit={{ $item['code'] }}">
                        <img src="{{ asset($item->getFirstMediaUrl('image')) }}" height="200px" width="100%" style="object-fit:cover;" alt="">
                    </a> 
                </div>
                <div class="support-desc">
                    <h6 class="text-uppercase">{{ $item['category_pack']['title'] }} </h6>
                    <span style=" color: #d60c0c;
                    font-size: 21px;
                    font-weight: 900;">{{ number_format($item['prix'],0) }} FCFA</span>
                </div>
                
                
            </div>
            @endforeach
     
         
        </div>
    </div>
    <!-- Container End -->
</div>