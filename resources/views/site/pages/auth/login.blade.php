@extends('site.layout')
@section('title','Se connecter')

@section('content')
<style>
    /* input::-webkit-outer-spin-button, */
    /* input::-webkit-inner-spin-button{
        -webkit-appearance: none;
        margin: 0;
    } */

    /* input[type=number]{
        -moz-appearance: textfield;
    } */
</style>
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
                            <h3 class="mb-10">Connexion</h3>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
                <div class="row">

                    <div class="col-md-3"></div>

                    <div class="col-md-6 col-sm-12">
                        <form class="form-register" method="POST" action="{{ route('login-user') }}">
                            @csrf
                         
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2 " for="number"><span class="require">*</span>Telephone</label>
                                <div class="col-md-10">
                                    <input type="number"  name="phone" class="form-control" id="number" required>
                                </div>

                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span class="require">*</span>Mot de passe:</label>
                                <div class="col-md-10 ">
                                    <input type="password" name="password" class="form-control mb-2" id="password" placeholder="Password" required>
                                    @include('admin.partials.hideShowPwd')

                                </div>
                            </div>
                            
                            <div class="terms mb-5">
                                <div class="text-center ">
                                    <input type="text" name="role" value="client" hidden>
                                    <input type="submit" value="Valider" class="return-customer-btn">
                                </div>
                                <p class="text-center py-3">Pas de compte?  <a href="{{ route('register-user') }}"><b style="color:orangered">Créer un compte</b></a></p>

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