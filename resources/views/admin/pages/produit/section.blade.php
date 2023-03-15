@extends('admin.layout')
@section('title', 'section')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add section -->
            <h5 class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i>
            Ajouter une section
            </button></h5>
            <div class="modal fade" id="basicModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ajouter une section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('section.store') }}" novalidate>
                @csrf

                <div class="col-12">
                  <label class="form-label">Type de la section</label>
                    <select name="type" class="form-select" aria-label="Default select example" required>
                      <option disabled selected></option>
                      <option value="produit">Produit</option>
                      <option value="publicite">Publicité</option>
                    </select>
                    <div class="invalid-feedback">Veuillez remplir ce champs</div>
                   
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="inputNanme4" required>
                  <div class="invalid-feedback">Veuillez remplir ce champs</div>

                  @error('title')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire add section -->



            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Type</th>
                  <th scope="col">Title</th>
                  <th scope="col">Nombre produits</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($section as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $item['type'] }}</td>
                  <td>{{ $item['title'] }}</td>
                  <td>@if ($item['type']=='produit')
                    {{ $item->produits->count() }}
                    @else
                    <span>Banniere pub</span>
                  @endif</td>
                
                  <td>
                   <div class="d-flex">
                    @if ($item['type']=='produit')
                    <a href="/boutique?section={{ $item['code'] }}"  role="button" class="btn btn-warning rounded-circle"><i class="bi bi-eye"></i></a>
                    @endif

                    <a href="{{ route('section.edit',$item['slug']) }}" role="button" data-id = {{ $item['slug'] }} data-bs-toggle="modal" data-bs-target="#basicModalEdit{{ $item['slug'] }}" class="btn btn-success rounded-circle mx-2 "><i class="bi bi-pencil"></i></a>
                    
                    <form  action="{{ route('section.delete',$item->id) }}" method="POST">
                      @csrf
                      <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash"></i> </a>
                     @include('admin.partials.deleteConfirm')
                    </form>
                   </div>
                    
                  </td>
                </tr>
                            <!-- start Formulaire edit section -->
            <div class="modal fade" id="basicModalEdit{{ $item['slug'] }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modifier une section </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3" method="post" action="{{ route('section.update',$item['slug']) }}">
                @csrf
                <div class="col-12">
                  <label class="form-label">Type de la section</label>
                    <select name="type" class="form-select" aria-label="Default select example" required>
                      <option disabled selected></option>
                      <option value="produit" {{ 'produit'==$item['type'] ?'selected': '' }}>Produit</option>
                      <option value="publicite" {{ 'publicite'==$item['type'] ?'selected': '' }}>Publicité</option>
                    </select>
                    <div class="invalid-feedback">Veuillez remplir ce champs</div>
                   
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" value="{{ $item['title'] }}" name="title" class="form-control @error('title') is-invalid  @enderror" id="inputNanme4">
                  @error('title')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                
                </div>
                <div class="form-group">
                  <label for="position">Position</label>
                  <select class="form-control" name="position" id="">
                      @for ($i = 1; $i <= count($section); $i++)   
                      <option value = "{{ $i}}" {{ $item['position'] == $i ? 'selected' : '' }} >{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire edit section -->
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