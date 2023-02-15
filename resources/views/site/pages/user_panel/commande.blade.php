@extends('site.layout')
@section('title','Mes commandes')

@section('content')
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;900&display=swap');

/* Resetting */









#main-content .h5,
#main-content .text-uppercase {
    font-weight: 600;
    margin-bottom: 0;
}

#main-content .h5+div {
    font-size: 0.9rem;
}

#main-content .box {
    padding: 10px;
    border-radius: 6px;
    width: 170px;
    height: 90px;
}

#main-content .box img {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

#main-content .box .tag {
    font-size: 0.9rem;
    color: #000;
    font-weight: 500;
}

#main-content .box .number {
    font-size: 1.5rem;
    font-weight: 600;
}

.order {
    padding: 10px 30px;
    min-height: 150px;
}

.order .order-summary {
    height: 100%;
}

.order .blue-label {
    background-color: #aeaeeb;
    color: #0046dd;
    font-size: 0.9rem;
    padding: 0px 3px;
}

.order .green-label {
    background-color: #a8e9d0;
    color: #008357;
    font-size: 0.9rem;
    padding: 0px 3px;
}

.order .fs-8 {
    font-size: 0.85rem;
}

.order .rating img {
    width: 20px;
    height: 20px;
    object-fit: contain;
}

.order .rating .fas,
.order .rating .far {
    font-size: 0.9rem;
}

.order .rating .fas {
    color: #daa520;
}

.order .status {
    font-weight: 600;
}

.order .btn.btn-primary {
    background-color: #fff;
    color: #ec7a32;
    border: 1px solid #ec7a32;
}

.order .btn.btn-danger {
    background-color: #fff;
    color: #a30a08;
    border: 1px solid #b4100e;
}

.order .btn.btn-primary:hover {
    background-color: #ec7a32;
    color: #fff;
}

.order .btn.btn-danger:hover {
    background-color: #b4251b;
    color: #fff;
}
.order .progressbar-track {
    margin-top: 20px;
    margin-bottom: 20px;
    position: relative;
}

.order .progressbar-track .progressbar {
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 0rem;
}

.order .progressbar-track .progressbar li {
    font-size: 1.5rem;
    border: 1px solid #333;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: #dddddd;
    z-index: 100;
    position: relative;
}

.order .progressbar-track .progressbar li.green {
    border: 1px solid #007965;
    background-color: #d5e6e2;
}

.order .progressbar-track .progressbar li::after {
    position: absolute;
    font-size: 0.9rem;
    top: 50px;
    left: 0px;
}

#tracker {
    position: absolute;
    border-top: 1px solid #bbb;
    width: 100%;
    top: 25px;
}

#step-1::after {
    content: 'Placed';
}

#step-2::after {
    content: 'Accepted';
    left: -10px;
}

#step-3::after {
    content: 'Packed';
}

#step-4::after {
    content: 'Shipped';
}

#step-5::after {
    content: 'Delivered';
    left: -10px;
}



/* Backgrounds */
.bg-purple {
    background-color: #55009b;
}

.bg-light {
    background-color: #f0ecec !important;
}

.green {
    color: #007965 !important;
}

/* Media Queries */
@media(max-width: 1199.5px) {
    nav ul li {
        padding: 0 10px;
    }
}

@media(max-width: 500px) {
    .order .progressbar-track .progressbar li {
        font-size: 1rem;
    }

    .order .progressbar-track .progressbar li::after {
        font-size: 0.8rem;
        top: 35px;
    }

    #tracker {
        top: 20px;
    }
}

@media(max-width: 440px) {
    #main-content {
        padding: 20px;
    }

    .order {
        padding: 20px;
    }

    #step-4::after {
        left: -5px;
    }
}

@media(max-width: 395px) {
    .order .progressbar-track .progressbar li {
        font-size: 0.8rem;
    }

    .order .progressbar-track .progressbar li::after {
        font-size: 0.7rem;
        top: 35px;
    }

    #tracker {
        top: 15px;
    }

    .order .btn.btn-primary {
        font-size: 0.85rem;
    }
}

@media(max-width: 355px) {
    #main-content {
        padding: 15px;
    }

    .order {
        padding: 10px;
    }
}
</style>


   <!-- Breadcrumb Start -->
   <div class="breadcrumb-area mt-30">
	<div class="container">
		<div class="breadcrumb">
			<ul class="d-flex align-items-center">
				<li><a href="javascript:history.go(-1)"><i class="fa fa-arrow-left"></i> Retour</a></li>
				<li><a href="{{ route('accueil') }}">Accueil</a></li>
				<li class="active"><a href="">Mes commandes</a></li>
			</ul>
		</div>
	</div>
	<!-- Container End -->
</div>
<!-- Breadcrumb End -->

<div class="container mt-5 ">
	<div class="row">
		<div class="col-lg-1 ">
			
		</div>
		<div class="col-lg-10 my-lg-0 my-1">
			<div id="main-content" class="bg-white border">
				
			
				<div class="text-uppercase text-center">Mes commandes ({{ $commande->count() }})</div>
				

				@foreach ($commande as $item)
				<div class="order my-3 bg-light">
					<div class="row">
						<div class="col-lg-4">
							<div class="d-flex flex-column justify-content-between order-summary">
								<div class="d-flex align-items-center">
									<div class="text-uppercase">Commande #{{ $item['code'] }}</div>
								</div>
								<div class="fs-8">Nombre de produits: {{ $item['nombre_produit'] }}</div>
								<div class="fs-8">Montant: {{ number_format($item['montant_total'],0) }} FCFA</div>

								<div class="fs-8">Date de la commande: {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}
								<br> Le {{ \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y') }}
								</div>
								
							</div>
						</div>
						<div class="col-lg-8">
							<div class="d-sm-flex align-items-sm-start justify-content-sm-between">
									@if ($item['status']=='livre')
									<div class="status text-success">Status : Commande livrée</div>
									@elseif ($item['status']=='attente')
									<div class="status text-primary">Status : Commande en attente</div>
									@endif
										<div>
											<a href="{{ route('facture-user',$item['id']) }}" id="detail" class="btn btn-primary text-uppercase">Details</a>
											<a href="" class="btn btn-danger text-uppercase">Annuler</a>

										</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			
			</div>
		</div>
		<div class="col-lg-1 my-lg-0 my-md-1">
			
		</div>
	</div>

</div>



@endsection