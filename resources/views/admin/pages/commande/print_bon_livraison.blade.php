<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="assets_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}

    
    <style>
        .container{
            /* font-size: 3px; */
        }
        .bon_livraison{
            text-transform: uppercase;
            font-weight: 700;
            padding-top: 60px;
            padding-left: 50px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif
        }
    
        .card1, .card2{
            border: 1px solid black;
            padding: 25px
        }
    
        .card1 p{
            margin-bottom: 3px;
            font-weight: bold;
        }
    
        .total{
            font-weight: bold
        }
    
        .card2 p{
            margin-bottom: 3px;
            font-weight:bold
        }
    
        .table-borderless tr td ,thead th{
           border: 1px solid black
    
        }
    
    
         .header{
    border-bottom: none
        }
    
    
        .amount{
            border:0.5px solid rgb(202, 197, 197);
            padding: 5px
        }
    
        .amount p{
            font-weight: bold;
            margin-bottom: 2px
        }
    
        .thanks{
            font-size: 13px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: rgb(145, 141, 141)
        }
    
        .signature p {
            letter-spacing: normal;
            font-weight: bold;
            margin-bottom: 0px;
            text-decoration: underline
        }
    
        .signature small {
            font-size: 11px;
          margin-left: 15px;
          color: rgb(111, 125, 133)
    
        }

        .d-flex{
            display: flex;
                justify-content: space-between;
                
        }
    
        
        
        </style> 
</head>
<body>




<div class="col-md-10 m-auto" id="div_print">

    <div class="card">
        <div class="card-body">
            <p class="card-text">
                
<div class="container">
    <div class="row">
        {{-- logo & text --}}
        <div class="col-md-10 m-auto">
            <div class="d-flex" >
                {{-- <img src="{{ asset('img/logo/logo_site.jpg') }}" width="100px" height="100px" alt=""> --}}
                <h3 class="bon_livraison">Bon de livraison</h3>
            </div>
        </div>
        
                {{-- infod client & commande --}}
          <div class="col-md-10 m-auto">
            @foreach ($detail as $item)
            <div class="d-flex justify-content-between mt-3">
                <div class="card1">
                    <p>Bon de livraison N<sup>0</sup>: BL{{ $item['id'] }}</p>
                    <p>Date: {{ \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y') }}</p>
                    <p>Lieu: {{ $item['livraison']['lieu'] }}</p>
                    <p>N<sup>0</sup>de commande:{{ $item['code'] }}</p>
                    <p>N<sup>0</sup>du client: {{ $item['users']['code'] }}</p>


                </div>

                <div class="card2">
                    <p>Destinataire:</p>
                    <p class="text-uppercase">{{ $item['livraison']['lieu'] }}</p>
                    <p>REFERENT:</p>
                    <P class="text-uppercase">{{ $item['users']['name'] }}</P>
                    <P>Tel: {{ $item['users']['phone'] }}</P>

                </div>
            </div>
            @endforeach
        
        </div>    
        
        
{{-- detail de la commande --}}
        <div class="col-md-10 m-auto mt-4 table-responsive">
            <table class="table table-borderless table-responsive  text-center">
                <thead>
                    <tr class="header">
                        <th scope="col-1">Réf <span>N<sup>0</sup></span><br></th>
                        <th scope="col-4">Description</th>
                        <th scope="col-1">Quantités <span>commandées</span><br></th>
                        <th scope="col-1">Quantités <span>livrées</span></th>
                        <th scope="col-1">Prix unitaire <span></span></th>

                        <th scope="col-5">PRIX TOTAL</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($detail as $item)
                        @foreach ($item->produits as $item)
                        <tr>
                            <td scope="row">{{ $item['code'] }}</td>
                            <td class="col-4">{{ $item['title'] }}</td>
                            <td class="col-1">{{ $item['pivot']['quantite'] }}</td>
                            <td class="col-1">{{ $item['pivot']['quantite'] }}</td>
                            <td class="col-1">{{ number_format($item['pivot']['prix_unitaire'],0) }} FCFA</td>
                            <td class="col-5">{{ number_format($item['pivot']['total'],0) }} FCFA</td>
                        </tr>
                        @endforeach
                    @endforeach
                   
                  

                    {{-- <tr>
                        <td colspan="5" style=""><span>Merçi d'avoir choisi notre entreprise pour nos services</span></td>
                        <td colspan="2">
                            <span class="total">Total: 10000 FCFA</span><br>
                        </td>
                    </tr> --}}
                </tbody>
               
            </table>


            {{-- amount --}}
            <div class="d-flex justify-content-between">

                <div class="">
                    <p class="thanks">Merçi d'avoir choisi notre entreprise pour nos services</p>
                    
                </div>
                @foreach ($detail as $item)
                <div class="amount">
                    <p>SOUS-TOTAL:{{ number_format($item['sous_total'],0) }} FCFA</p>
                    <p>LIVRAISON: {{ number_format($item['tarif_livraison'],0) }} FCFA</p>
                    <P>MONTANT TOTAL: {{ number_format($item['montant_total'],0) }} FCFA</P>
                </div>
               

                
            </div>

                {{-- amount --}}
                <div class="d-flex justify-content-around mt-3 mb-2">

                    <div class="signature">
                        <p>
                            VISA DU CLIENT
                        </p>   
                        <small class="" >(Signature et date)</small>

                        <p class="text-center text-uppercase" style="text-decoration: none"> {{ $item['users']['name'] }}</p>
                        <P class="text-center" style="text-decoration: none">{{ $item['users']['phone'] }}</P>
                     
                    </div>
                    <div class="signature">
                        <p>DOOYA.CI</p>
                      
                    </div>
    
                    
                </div>

                @endforeach

                <div class="d-flex justify-content-around mt-5">
                    <span>Reçu le:</span>
                    <span>Livré le:</span>

                </div>

                <div class="mt-5 text-center">
                    <small>
                        Abidjan, Cocody - Tel(225)0769359012 / RCC: CI-ABJ-03-2022-B13-072018 / WWW.DOOYA.CI
                    </small>
                </div>
            
        </div>
    </div>
</div>

            </p>
        </div>
    </div>
</div>



</body>
</html>