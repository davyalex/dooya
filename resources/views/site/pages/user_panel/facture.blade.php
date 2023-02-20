@extends('site.layout')
@section('title','Ma facture')
@section('url',url()->current())

@section('content')
          <!-- Breadcrumb Start -->
          <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i> Retour</a></li>
                        <li><a href="{{ route('accueil') }}">Accueil</a></li>
                        <li><a href="{{ route('boutique') }}">Boutique</a></li>
                        <li class="active"><a href="">Facture</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- coupon-area start -->
      
        <!-- checkout-area start -->
        <div class="checkout-area pb-100 pt-15 pb-sm-60">
            <div class="container">
                <div class="row">
                   
                    <div class="col-lg-6 col-md-6 m-auto">
                        @role(['administrateur','webmaster'])
                       <div class="wc-proceed-to-checkout text-center mb-2">
                        <a href="javascript:history.go(-1)" id=""><i class="fa fa-dashboard"></i> Retour en administration</a>
                    </div>

                    <div class="text-center mb-2">
                        <div class="dropdown">
                            <button class="btn btn-success" class="fa fa-whatsapp btn btn-success rounded-circle  dropdown-toggle mx-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">Envoyer la commande 
                              <i class="fa fa-whatsapp"
                              ></i>
                            </button>
                              <div class="dropdown-menu" aria-labelledby="triggerId">
                               @foreach ($user as $item)
                               <a target="_blank" href="https://wa.me/+225{{ $item->phone }}/?text= bonjour,{{ $item['name'] }} veuillez traiter cette commande {{ url()->current() }}
                                " class="">
                                <div class=" dropdown-divider"></div>
                                  <h5 class="text-dark text-center px-3 py-1" >  {{ $item['name'] }} <small>({{ $item['roles'][0]['name'] }})</small> <small>({{ $item['phone'] }})</small></h5>
                              </a>
                               @endforeach
                               
                          </div>
                            </div>
                    </div>
                       @endrole
                        <div class="your-order">
                            <h3 class="text-center">Facture</h3>
                            @foreach ($facture as $item)

                            <div class="d-flex justify-content-between">

                                <div class="text-left">
                                    <h6><b>N <sup>0</sup>  commande:</b> {{ $item['code'] }}</h6>
                                    <h6 class=""><b>Date:</b> {{ $item['created_at'] }} </h6>
                                </div>

                                <div class="text-right">
                                    <span>  <b>Client:</b> {{ $item['users']['name'] }}</span><br>
                                    <span>  <b>Contact:</b> {{ $item['users']['phone'] }}</span><br>
                                    <span> <b> Email:</b> {{ $item['users']['email'] }}</span>
                                </div>
                              

                            </div>

                            @endforeach
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produits</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       

                                        @foreach ($facture as $key=> $item)
                                      
                                        @foreach ($item->produits as $item)
                                        <tr class="cart_item">
                                           
                                            <td class="product-name">
                                                    
                                                <p class="d-flex py-1">
                                                    <a href="/detail?produit={{ $item['code'] }}"> 
                                                         <img src="{{ asset($item->getFirstMediaUrl('image')) }}" alt="" width="50px" height="50px">
                                                    </a>
                                                    <span class="mx-2">
                                                        {{ $item['title'] }} <br>
                                                        {{ $item['pivot']['quantite'] }}  × {{ number_format($item['pivot']['prix_unitaire'] ,0)  }} FCFA
                                                    </span>
                                               </p>
                                               
                                    
                                              
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{ number_format($item['pivot']['total'],0)  }} FCFA</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                      
                                     
                                    </tbody>
                                    <tfoot>
                                       @foreach ($facture as $item)
                                       <tr class="cart-subtotal">
                                        <th> <b><i class="fa fa-money"></i> Sous-total</b></th>
                                        <td><span class="amount" >{{ number_format($item['sous_total'],0) }} FCFA</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th><b><i class="fa fa-motorcycle"></i> Livraison</b></th>
                                        <td><span class="shipping">{{ $item['livraison']['lieu'] }}</span><br> <span>{{ number_format($item['livraison']['tarif'],0) }} FCFA</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th><i class="fa fa-tags"></i> Montant Total</th>
                                        <td><span class="total_amount">{{ number_format($item['montant_total'],0) }} FCFA</span>
                                        </td>
                                    </tr>
                                       @endforeach
                                    </tfoot>
                                </table>
                            </div>
                         
                          
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="wc-proceed-to-checkout text-center">
                <a href="" id="print"><i class="fa fa-print"></i> Imprimer</a>
            </div> --}}
        </div>
     
        <!-- checkout-area end -->

        <script>
         
        </script>
@endsection