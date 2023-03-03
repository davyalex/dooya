@extends('admin.layout')
@section('title', 'Sous-Categorie')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add sous_category -->
            <h5 class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i>
            Ajouter une sous categorie
            </button></h5>
            <div class="modal fade" id="basicModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ajouter une categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('sous_category.store') }}" novalidate>
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid  @enderror" id="inputNanme4" required>
                  <div class="invalid-feedback">Veuillez entrer une sous categorie</div>

                  @error('title')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                
                </div>


                <div class="col-12">
                  <label class="form-label">Categorie</label>
                    <select name="category" class="form-select  @error('category') is-invalid @enderror" aria-label="Default select example" required>
                      <option disabled selected></option>
                      @foreach ($category as $item)
                      <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                      @endforeach
                      
                    </select>
                    <div class="invalid-feedback">Veuillez entrer une catégorie</div>
                    @error('category')
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
            </div> <!-- Formulaire add sous_category -->



            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Categorie</th>
                  <th scope="col">Nombre produits</th>
                  <th scope="col">date</th>

                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sous_category as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $item['title'] }}</td>
                  <td>{{ $item->categorie->title }}</td>
                  <td>{{ $item->produits->count() }}</td>
                  <td> {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</td>

                
                  <td>
                   <div class="d-flex">
                    <a href="/boutique?sous_category={{ $item['code'] }}"  role="button" class="btn btn-warning rounded-circle"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('sous_category.edit',$item['slug']) }}" role="button" data-id = {{ $item['slug'] }} data-bs-toggle="modal" data-bs-target="#basicModalEdit{{ $item['slug'] }}" class="btn btn-success rounded-circle mx-2 "><i class="bi bi-pencil"></i></a>
                    
                    <form  action="{{ route('sous_category.delete',$item->id) }}" method="POST">
                      @csrf
                      <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash"></i> </a>
                     @include('admin.partials.deleteConfirm')
                    </form>
                   </div>
                    
                  </td>
                </tr>
                            <!-- start Formulaire edit sous_category -->
            <div class="modal fade" id="basicModalEdit{{ $item['slug'] }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modifier une categorie </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3" method="post" action="{{ route('sous_category.update',$item['slug']) }}">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" value="{{ $item['title'] }}" name="title" class="form-control @error('title') is-invalid  @enderror" id="inputNanme4">
                  @error('title')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                
                </div>

                <div class="col-12">
                  <label class="form-label">Categorie</label>
                    <select aria-placeholder="selectionner" name="category" class="form-select  @error('category') is-invalid @enderror" aria-label="Default select example" required>
                      <option disabled selected></option>
                      @foreach ($category as $value)
                      <option value="{{ $value['id'] }}" {{ $value['id']==$item['category_id'] ?'selected': '' }} >{{ $value['title'] }}</option>
                      <div class="invalid-feedback">Veuillez entrer une catégorie</div>
                      @endforeach

                    </select>
                    @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire edit sous_category -->
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