@extends('site.layout')
@section('title','Detail')

@section('content')
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class=""><a href="{{ route('boutique') }}">Boutique</a></li>
                <li class=""><a href="">@yield('title')</a></li>
                @if (request('pack'))
                <li class=""><a href="">Pack</a></li>
                <li class="active"><a href="">{{ $pack['category_pack']['title'] }}</a></li>
                @elseif (request('produit'))  
                <li class=""><a href="">Produit</a></li>
                <li class="active"><a href="">{{ $produit['title'] }}</a></li>
                @endif

            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>

@if (request('produit'))
    @include('site.pages.sections.detail_produit')
@elseif (request('pack'))
@include('site.pages.sections.detail_pack')

@endif
@endsection