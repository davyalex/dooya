<div class="col-xl-9 col-lg-8 slider_box">
    <div class="slider-wrapper theme-default">
        <!-- Slider Background  Image Start-->
        <div id="slider" class="nivoSlider">
            @foreach ($slider as $item)
                 @foreach ($item->getMedia('image') as $item)
                 <a href="{{ route('boutique') }}"><img src="{{ asset($item->getUrl()) }}" data-thumb="{{ asset($item->getUrl()) }}" alt="" title="#htmlcaption"  /></a>
                 @endforeach
            @endforeach
        </div>
        <!-- Slider Background  Image Start-->
    </div>
</div>