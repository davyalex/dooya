@extends('site.layout')
@section('title','Mon profil')

@section('content')
 <!-- Breadcrumb Start -->
 <div class="breadcrumb-area mt-30 mb-10">
	<div class="container">
		<div class="breadcrumb">
			<ul class="d-flex align-items-center">
				<li><a href="{{ route('boutique') }}"><i class="fa fa-arrow-left"></i> Retour en boutique</a></li>
				<li><a href="{{ route('accueil') }}">Accueil</a></li>
				<li class="active"><a href="">Mes commandes</a></li>
			</ul>
		</div>
	</div>
	<!-- Container End -->
</div>
<!-- Breadcrumb End -->
     <!-- Product Thumbnail Description Start -->
     <div class="thumnail-desc mt-30">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc nav tabs-area" role="tablist">
                        <li><a class="active" data-toggle="tab" href="#infos">Mes infos</a></li>
                        <li><a data-toggle="tab" href="#edit-profil">Editer mon profil</a></li>
                        <li><a data-toggle="tab" href="#edit-password">Changer mon mot de passe</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default" style="background:#f6f9ff">
                        <div id="infos" class="tab-pane fade show active">
                            <p>
                                <div class="register-account ">
                                    <div class="container">
                                        <div class="row">
                                            <div class=" text-center col-sm-12">
                                                <div class="register-title">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row End -->
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 col-sm-12 m-auto">
                                               <div class="card">
                                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center" style="border">
                                                    <img src="{{ asset('assets_admin/img/avatar.jpg') }}" alt="Profile" class="rounded-circle">
                                                    <h2>{{ Auth::user()->name }}</h2>
                                                    <h3>{{ Auth::user()->phone }}</h3>
                                                    <h4>{{ Auth::user()->email }}</h4>
                                                    
                                                  </div>
                                               </div>
                                            </div>
                        
                                            <div class="col-md-3"></div>
                                           
                                        </div>
                                        <!-- Row End -->
                                    </div>
                                    <!-- Container End -->
                                </div>
                            </p>
                        </div>

                        {{-- edit infos user --}}

                        <div id="edit-profil" class="tab-pane fade show">
                            <p>
                                <div class="register-account mt-3 ">
                                    <div class="container">
                                        <div class="row">
                                            <div class=" text-center col-sm-12">
                                                <div class="register-title">
                                                    <h3 class="mb-10">Modifier mes informations </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row End -->
                                        <div class="row">
                        
                                            <div class="col-md-3"></div>
                        
                                            <div class="col-md-6 col-sm-12">
                                                <form class="form-register" method="POST" action="{{ route('profil-update',Auth::user()->id) }}">
                                                    @csrf
                                                        {{-- @if (Session::has('message'))
                                                            <p class="alert alert-danger text-center ">{{ Session::get('message') }}</p>
                                                        @endif --}}
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label " for="l-name"><span class="require">*</span>Nom & Prenoms</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="l-name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2 " for="email">Email</label>
                                                        <div class="col-md-10">
                                                            <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2 " for="number"><span class="require">*</span>Telephone</label>
                                                        <div class="col-md-10">
                                                            <input type="number" name="phone" value="{{ Auth::user()->phone }}" class="form-control" id="number" required>
                                                        </div>
                                                    </div>
                                                  
                                                    
                                                    <div class="terms mb-5">
                                                        <div class="text-center ">
                                                            <input type="submit" value="Modifier" class="return-customer-btn">
                                                        </div>
                        
                                                    </div>
                                                   
                                                </form>
                                            </div>
                        
                                            <div class="col-md-3"></div>
                                           
                                        </div>
                                        <!-- Row End -->
                                    </div>
                                    <!-- Container End -->
                                </div>
                              </p>
                        </div>


                        {{-- edit password --}}

                        <div id="edit-password" class="tab-pane fade show">
                            <p>
                                <div class="register-account mt-3 ">
                                    <div class="container">
                                        <div class="row">
                                            <div class=" text-center col-sm-12">
                                                <div class="register-title">
                                                    <h3 class="mb-10">Modifier mon mot de passe </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row End -->
                                        <div class="row">
                        
                                            <div class="col-md-3"></div>
                        
                                            <div class="col-md-6 col-sm-12">
                                                <form class="form-register" method="POST" action="{{ route('profil-user-password',Auth::user()->id) }}">
                                                    @csrf
                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Ancien mot de passe:</label>
                                                        <div class="col-md-10">
                                                            <input type="password" name="password" class="form-control" id="pwd" placeholder="" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group d-md-flex align-items-md-center">
                                                        <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Nouveau mot de passe:</label>
                                                        <div class="col-md-10">
                                                            <input type="password" name="newPassword" class="form-control" id="pwd" placeholder="" required>
                                                        </div>
                                                    </div>

                                                    <div class="terms mb-5">
                                                        <div class="text-center ">
                                                            <input type="submit" value="Modifier" class="return-customer-btn">
                                                        </div>
                        
                                                    </div>
                                                   
                                                </form>
                                            </div>
                        
                                            <div class="col-md-3"></div>
                                           
                                        </div>
                                        <!-- Row End -->
                                    </div>
                                    <!-- Container End -->
                                </div>
                              </p>
                        </div>


                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->
@endsection