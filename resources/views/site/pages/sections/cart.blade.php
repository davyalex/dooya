<li><a href="{{ route('cart') }}"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">
    {{ count((array) session('cart')) }}
</span><span>Panier</span></span></a>
    {{-- <ul class="ht-dropdown cart-box-width">
        <li>
            <!-- Cart Box Start -->
            @if (session('cart'))
            @foreach (session('cart') as $id => $details)
            <div class="single-cart-box">

                <div class="cart-img">
                   <img src="{{ asset($details['image']) }}" alt="cart-image" class="img-cart">
                    <span class="pro-quantity">{{ $details['quantite'] }}</span>
                </div>
                <div class="cart-content">
                    <h6><a href="">{{ $details['quantite'] }}</a></h6>
                    <span class="cart-price">{{ $details['prix'] }} FCFA</span>
                </div>
                <a class="del-icone remove-from-cart" data-id = {{ $id }} href="#"><i class="ion-close"></i></a>
            </div>
            @endforeach
          
            @endif
          
          
            <div class="cart-footer">
               <ul class="price-content">

                @php $total = 0 @endphp
                @foreach((array) session('cart') as $id => $details)
                    @php $total += $details['prix'] * $details['quantite'] @endphp
                @endforeach
                   <li class="get-total">Total <span>{{ $total }} FCFA</span></li>
               </ul>
                <div class="cart-actions text-center">
                    <a class="" href="{{ route('cart') }}">Voir Mon panier</a>
                </div>
            </div>
        </li>
    </ul> --}}

    {{-- @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div> 
@endif --}}


<script>
     $(".remove-from-cart").click(function (e) {
        
        e.preventDefault();

  

        var ele = $(this);

  console.log(ele.attr("data-id"));

        

            $.ajax({

                url: '{{ route('remove.from.cart') }}',

                method: "DELETE",

                data: {

                    _token: '{{ csrf_token() }}', 

                    id: ele.attr("data-id")

                },

                success: function (response) {

                    window.location.reload();

                }

            });


    });
</script>
</li>