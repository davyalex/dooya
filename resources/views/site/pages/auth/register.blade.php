@extends('site.layout')
@section('title','Creer un compte')

@section('content')
         <!-- Breadcrumb Start -->
         <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="{{ route('accueil') }}">Accueil</a></li>
                        <li class="active"><a href="">@yield('title')</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
       <!-- Register Account Start -->
        <div class="register-account mt-5">
            <div class="container">
                <div class="row">
                    <div class=" text-center col-sm-12">
                        <div class="register-title">
                            <h3 class="mb-10">Créer un compte </h3>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
                <div class="row">

                    <div class="col-md-3"></div>

                    <div class="col-md-6 col-sm-12">
                        <form class="form-register" method="POST" action="{{ route('register') }}">
                            @csrf
                                {{-- @if (Session::has('message'))
                                    <p class="alert alert-danger text-center ">{{ Session::get('message') }}</p>
                                @endif --}}
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label " for="l-name"><span class="require">*</span>Nom & Prenoms</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" class="form-control" id="l-name" required>
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2 " for="email">Email</label>
                                <div class="col-md-10">
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2 " for="number"><span class="require">*</span>Telephone</label>
                                <div class="col-md-10">
                                    <input type="number" name="phone" class="form-control" id="number" required>
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Password:</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>
                                </div>
                            </div>
                            
                            <div class="terms mb-5">
                                <div class="text-center ">
                                    <input type="text" name="role" value="client" hidden>
                                    <input type="submit" value="Valider" class="return-customer-btn">
                                </div>
                                <p class="text-center py-3">Vous avez un compte?  <a href="{{ route('login') }}">Connectez vous</a></p>

                            </div>
                           
                        </form>
                    </div>

                    <div class="col-md-3"></div>
                   
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Register Account End -->
@endsection