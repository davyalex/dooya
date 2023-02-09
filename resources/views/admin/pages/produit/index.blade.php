@extends('admin.layout')
@section('title', 'Produit')


@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add section -->
            <h5 class="card-title">
            <a href="{{ route('produit.create') }}" role="button" class="btn btn-primary"><i class="bi bi-plus"></i>
            Ajouter un produit
            </a></h5>
          


            <!-- Table with stripped rows -->
            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">code</th>
                  <th scope="col">produit</th>
                  <th scope="col">prix</th>
                  <th scope="col">categorie</th>
                  <th scope="col">solde</th>
                  <th scope="col">date</th>

                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produit as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key}}</th>
                  <th scope="row">#{{ $item['code'] }} <br>
                    <img src="{{ $item->getFirstMediaUrl('image') }}"
                    alt="{{ $item->getFirstMediaUrl('image') }}"
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                    />
                  </th>
                  <td>{{ Str::limit($item['title'],10,'...' ) }}</td>
                  <td>{{ number_format($item['prix'], 0,',', ' ') }}</td>
                  <td>
                   
                    <span>{{ $item['category']['title'] }} <br>
                    <small>{{ $item['sous_category']['title'] }}  </small>
                    </span>
                    
                  </td>



                  <td>
                  @if ($item['promotion']==1)
                      <span>{{ $item['date_debut_promo'] }}</span> <br>
                      <span>{{ \Carbon\Carbon::parse($item['date_fin_promo'])->format('d-m-Y') }}</span><br>
                      <span class=" text-white text-bold badge bg-danger">{{ number_format($item['prix_promo'], 0,',', ' ') }}</span>  
                      @endif
                    </td>
                    <td> {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</td>


                
                  <td>
                   <div class="d-flex">
                    <a href="/post/produit?produit={{ $item['slug'] }}"  role="button" class="btn btn-warning rounded-circle"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('produit.edit',$item['code']) }}" role="button"  class="btn btn-success rounded-circle mx-2 "><i class="bi bi-pencil"></i></a>
                    
                    <form  action="{{ route('produit.delete',$item->id) }}" method="POST">
                      @csrf
                      <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash"></i> </a>
                     @include('admin.partials.deleteConfirm')
                    </form>
                   </div>
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->





          </div>
        </div>

      </div>
    </div>
 
    
    
  </section>
@endsection