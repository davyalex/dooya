<div class="support-area bdr-top">
    <div class="container mb-1">
        <div class="d-flex flex-wrap text-center">
            @foreach ($pack as $item)
            <div class="single-support">
             
               
                <div class="support-icon">
                    <a href="/detail?pack={{ $item['code'] }}">
                        <img src="{{ asset($item->getFirstMediaUrl('image')) }}" height="250px" max-width="300px" style="object-fit:contain;" alt="">
                    </a> 
                </div>
                <div class="support-desc">
                    <h6 class="">{{ $item['category_pack']['title'] }}</h6>
                    <span>{{ $item['prix'] }} FCFA</span>
                </div>
                
                
            </div>
            @endforeach
     
         
        </div>
    </div>
    <!-- Container End -->
</div>