@extends('site.layout')
@section('title','Panier')

@section('content')
          <!-- Breadcrumb Start -->
          <div class="breadcrumb-area mt-10">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{ route('accueil') }}">Accueil</a></li>
                        <li><a href="{{ route('boutique') }}">Boutique</a></li>
                        <li class="active"><a href="#">Panier</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Cart Main Area Start -->
        <div class="cart-main-area ptb-10 ptb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <!-- Form Start -->
                        {{-- <form action="#"> --}}
                            <!-- Table Content Start -->
                            <div class="table-content table-responsive mb-45">
                                <table id="cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Produit</th>
                                            <th class="product-price">Prix</th>
                                            <th class="product-quantity">Quantité</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                            @if (session('cart'))

                                                @foreach(session('cart') as $id => $details)

                                                     @php $total += $details['prix'] * $details['quantite'] @endphp
                                            <tr data-id="{{ $id }}">
                                                <td class="product-thumbnail">
                                                    <a href=""><img src="{{ $details['image'] }}" alt="cart-image" /></a>
                                                </td>
                                                <td class="product-name"><a href="#">{{ $details['title'] }}</a></td>
                                                <td class="product-price"><span class="amount">{{ number_format($details['prix'],0) }} FCFA</span></td>
                                                <td class="product-quantity"><input type="number" value="{{ $details['quantite'] }}" class=" quantite update-cart" /></td>
                                                <td class="product-subtotal">{{ number_format($details['prix'] * $details['quantite'],0) }} FCFA</td>
                                                <td class="product-remove"> <button class="remove-from-cart"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                            </tr>
                                            @endforeach
                                           
                                            @endif
                                      
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Content Start -->
                            <div class="row">
                               <!-- Cart Button Start -->
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        {{-- <input type="submit" value="Update Cart" /> --}}
                                        <a href="{{ route('boutique') }}">Poursuivre mes achats</a>
                                    </div>
                                </div>
                                <!-- Cart Button Start -->
                                <!-- Cart Totals Start -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="cart_totals float-md-right text-md-right">
                                        <h2>Total panier</h2>
                                        <br />
                                        <table class="float-md-right">
                                            <tbody>
                                                {{-- <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount">$215.00</span></td>
                                                </tr> --}}
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount">{{ number_format($total,0) }} FCFA</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="{{ route('caisse') }}">Finaliser la commande</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Totals End -->
                            </div>
                            <!-- Row End -->
                        {{-- </form> --}}
                        <!-- Form End -->
                    </div>
                </div>
                 <!-- Row End -->
            </div>
        </div>
        <!-- Cart Main Area End -->

        <script type="text/javascript">

  

            $(".update-cart").change(function (e) {
        
                e.preventDefault();
        
          
        
                var ele = $(this);
        
          
        
                $.ajax({
        
                    url: '{{ route('update.cart') }}',
        
                    method: "patch",
        
                    data: {
        
                        _token: '{{ csrf_token() }}', 
        
                        id: ele.parents("tr").attr("data-id"), 
        
                        quantite: ele.parents("tr").find(".quantite").val()
        
                    },
        
                    success: function (response) {
        
                       window.location.reload();
        
                    }
        
                });
        
            });
        
          
        
            $(".remove-from-cart").click(function (e) {
        
                e.preventDefault();
        
          
        
                var ele = $(this);
        
          
        
                
        
                    $.ajax({
        
                        url: '{{ route('remove.from.cart') }}',
        
                        method: "DELETE",
        
                        data: {
        
                            _token: '{{ csrf_token() }}', 
        
                            id: ele.parents("tr").attr("data-id")
        
                        },
        
                        success: function (response) {
        
                            window.location.reload();
        
                        }
        
                    });
        
        
            });
        
          
        
        </script>
@endsection