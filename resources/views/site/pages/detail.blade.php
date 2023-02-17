@extends('site.layout')
@section('title',$produit->title)
@section('description',$produit ->description)
@section('image',asset($produit->getFirstMediaUrl('image')))
@section('url',url()->current())

@section('content')
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center"></ul>
                <li><a href="javascript:history.go(-1)"><i class="fa fa-caret-right"></i> Retour</a></li>
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class=""><a href="{{ route('boutique') }}">Boutique</a></li>
                <li class=""><a href="">@yield('title')</a></li>
                @if (request('pack'))
                <li class=""><a href="">Pack</a></li>
                    @if ($produit)
                    <li class="active"><a href="">{{ $produit['category_pack']['title'] }}</a></li>
                    @endif
                @elseif (request('produit'))  
                <li class=""><a href="">Produit</a></li>
                <li class="active"><a href="">{{ $produit['title'] }}</a></li>
                @endif

            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>

@if ( $produit)
    @include('site.pages.sections.detail_produit')
{{-- @elseif (request('pack'))
@include('site.pages.sections.detail_pack') --}}
@endif


@endsection