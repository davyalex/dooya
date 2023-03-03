@extends('site.layout')
@section('title','Commande')

@section('content')
          <!-- Breadcrumb Start -->
          <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="javascript:history.go(-1)"><i class="fa fa-caret-left"></i> Retour</a></li>
                        <li><a href="{{ route('accueil') }}">Accueil</a></li>
                        <li class="active"><a href="">Caisse</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- coupon-area start -->
        <div class="coupon-area pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            {{-- <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                    <form action="#">
                                        <p class="form-row-first">
                                            <label>Username or email <span class="required">*</span></label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password  <span class="required">*</span></label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" value="Login" />
                                            <label>
											<input type="checkbox" />
											 Remember me 
										</label>
                                        </p>
                                        <p class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div> --}}
                            <!-- ACCORDION END -->
                            <!-- ACCORDION CODE PROMO -->
                            {{-- <h3>Vous avez un code promo? <span id="showcoupon">Cliquez içi pour entrer votre code promo</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" class="code" placeholder="Entrez votre code promo" />
                                            <input type="submit" value="Appliquer" />
                                        </p>
                                    </form>
                                </div>
                            </div> --}}
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coupon-area end -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-100 pt-15 pb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form mb-sm-40">
                            <h3>Details du client</h3>
                            <div class="row">
                              
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-sm-30">
                                        <label>Nom & prenom <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="" disabled />
                                    </div>
                                </div>
             
                             
                               
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Email </label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="" disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Telephone  <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{ Auth::user()->phone }}"  placeholder="" disabled />
                                    </div>
                                </div>
                              
                            </div>
                           
                        </div>

{{-- 
                        <div class="payment-method">
                                
                            <div id="accordion">
                              
                                <div class="card">
                                    <div class="card-header" id="headingone">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Paiement à la livraison 
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Le paiement pour les commandes sur Abidjan se font après reception du colis</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingthree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Paiement hors Abidjan
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                        <div class="card-body">
                                             <p>Le paiement pour les commandes hors Abidjan necessite une contre-partie du montant de la commande .</p>
                                        </div>
                                    </div>
                                </div>

                            
                            </div>
                        </div> --}}


                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <h3>Votre commande</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produits</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @php $total = 0 @endphp
                                        @php $sub_total = 0 @endphp

                                        @foreach ($cart_detail as $key=> $item)
                                        @php $sub_total += $item['prix'] * $item['quantite'] @endphp
                                        @php $total += $item['prix'] * $item['quantite'] @endphp
                                        <tr class="cart_item">
                                           
                                            <td class="product-name">
                                                    <p class="d-flex">
                                                        <a href="/detail?produit={{ $item['code'] }}">
                                                            <img src="{{ asset($item['image']) }}" alt="" width="50px" height="50px">
                                                        </a>
                                                        <span class="mx-2">
                                                            {{ $item['title'] }} <br>
                                                            {{ $item['quantite'] }}  × {{ number_format($item['prix'],0)  }} FCFA
                                                        </span>
                                                   </p>
                                              
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{ number_format($item['prix'] * $item['quantite'],0 )}} FCFA</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                      
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th> <b><i class="fa fa-money"></i> Sous-total</b></th>
                                            <td><span class="amount" data-target="{{ $sub_total }}">{{ number_format($sub_total,0) }} FCFA</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th><b><i class="fa fa-motorcycle"></i> Livraison</b></th>
                                            <td><span class="shipping"></span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th><i class="fa fa-tags"></i> Montant Total</th>
                                            <td><span class="total_amount">{{ number_format($total,0) }} FCFA</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                          <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <div class="col-md-12 mt-4">
                                        <div class="country-select clearfix mb-30">
                                            <label>Choisissez une Zone de livraison <span class="required">*</span></label>
                                            <select class="wide" id="shipping" name="livraison">
                                                <option disabled value selected>Selectionner</option>
                                                @foreach ($livraison as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['lieu'] }}</span></option>
                                                @endforeach
                                           </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <div class="country-select clearfix mb-30" id="divCommune">
                                            <label>Choisissez une commune <span class="required">*</span></label>
                                            <select class=" wide" id="shippingCommune" name="livraison">
                                                <option disabled value selected>Selectionner</option>
                                                @foreach ($commune as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['lieu'] }}</option>
                                                @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </p>
                            </div>
                          </div>
                          
                            <div class="wc-proceed-to-checkout">
                                <a href="{{ route('commande.store') }}" id="valide_commande">Valider ma commande</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->

        <script>
            $(document).ready(function () {


                $('#divCommune').hide();

                var getId = "";
                //recuperation du tarif livraison et actualisation du montant total
                $('select').change(function (e) { 

                    var ville = $('#shipping option:selected').html();

                    if (ville === 'Abidjan') {
                        $('#divCommune').show(200);
                        var getZone = $('#shippingCommune option:selected').val();
                        var getId = getZone;
                    }else{
                        $('#divCommune').hide();
                        var getZone = $('#shipping option:selected').val();
                        var getId = getZone;
                    }


                    console.log(getId);

                    e.preventDefault();
                    var total = {{ Js::from($total) }};
                    console.log(total);
                    $.ajax({
                        type: "GET",
                        url: "/refresh_shipping/" + getId,
                        data:{total:total},
                        dataType: "json",
                        success: function (response) {
                           $('.shipping').html(response.livraison)
                           $('.total_amount').html(response.total)

                        }
                    });
                });


                //recuperation des details de la commande et insertion database

            
                $("#valide_commande").click(function (e) { 
                    e.preventDefault();

                    var getVille= $('#shipping option:selected').html();
                    if (getVille ==='Abidjan') {
                        var getLivraison = $('#shippingCommune option:selected').val();
                        }else{
                            var getLivraison = $('#shipping option:selected').val();
                        }

                        //validation message for commune no selected
                       
                        console.log(getLivraison);


                    var getSousTotal = {{ Js::from($sub_total) }};
                    var getTotal = {{ Js::from($total) }};
                    var data = {livraison: getLivraison,sousTotal : getSousTotal, total : getTotal};
                    if (getLivraison.length < 1 ) {
                        Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Veuillez choisir une zone de livraison ',
                        showConfirmButton: false,
                        timer: 3000
                        })
                    }
                    if (getVille ==='Abidjan') {
                           var commune = $('#shippingCommune option:selected').val();
                           if (commune.length < 1) {
                            Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Veuillez choisir une commune ',
                        showConfirmButton: false,
                        timer: 3000
                        })
                           }
                        }
                        

                    if(getLivraison.length > 1){
                        $.ajax({
                        type: "GET",
                        url: "/valider-ma-commande/" ,
                        data:data,
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                           toast: true,
                            icon: 'success',
                            title: 'Votre commande a été validé avec success',
                            animation: false,
                            position: 'top-right',
                            background:'#3da108',
                            iconColor:'#fff',
                            color:'#fff',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        window.location="{{ route('commande-user') }}"
                            }
                        }
                    });
                    }

                   
                });
               
            });
        </script>
@endsection