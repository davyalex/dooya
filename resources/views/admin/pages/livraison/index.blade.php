@extends('admin.layout')
@section('title', 'livraison')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add livraison -->
            <h5 class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i>
            Ajouter une livraison
            </button></h5>
            <div class="modal fade" id="basicModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ajouter une livraison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('livraison.store') }}" novalidate>
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Lieu</label>
                  <input type="text" name="lieu" class="form-control @error('lieu') is-invalid  @enderror" id="inputNanme4" required>
                  <div class="invalid-feedback">Veuillez entrer un lieu de livraison</div>
                  @error('lieu')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Tarif</label>
                    <input type="text" name="tarif" class="form-control @error('tarif') is-invalid  @enderror" id="inputNanme4" required>
                    <div class="invalid-feedback">Veuillez entrer un tarif</div>
  
                    @error('tarif')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  
                  </div>

                  <div class="col-12">
                    <textarea name="description" class="tinymce-editor">
                       
                      </textarea><!-- End TinyMCE Editor -->
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire add livraison -->



            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Lieu</th>
                  <th scope="col">Tarif</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($livraison as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $item['lieu'] }}</td>
                  <td>{{ $item['tarif'] }}</td>
                  <td>{!! $item['description'] !!}</td>
                
                  <td>
                   <div class="d-flex">
                    <a href="/post/livraison?livraison={{ $item['code'] }}"  role="button" class="btn btn-warning rounded-circle"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('livraison.edit',$item['code']) }}" role="button" data-id = {{ $item['code'] }} data-bs-toggle="modal" data-bs-target="#basicModalEdit{{ $item['code'] }}" class="btn btn-success rounded-circle mx-2 "><i class="bi bi-pencil"></i></a>
                    
                    <form  action="{{ route('livraison.delete',$item->id) }}" method="POST">
                      @csrf
                      <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash"></i> </a>
                     @include('admin.partials.deleteConfirm')
                    </form>
                   </div>
                    
                  </td>
                </tr>
                            <!-- start Formulaire edit livraison -->
            <div class="modal fade" id="basicModalEdit{{ $item['code'] }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modifier une livraison </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3" method="post" action="{{ route('livraison.update',$item['code']) }}">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Lieu</label>
                    <input type="text" value="{{ $item['lieu'] }}" name="lieu" class="form-control @error('lieu') is-invalid  @enderror" id="inputNanme4" required>
                    <div class="invalid-feedback">Veuillez entrer un lieu de livraison</div>
  
                    @error('lieu')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  
                  </div>
  
                  <div class="col-12">
                      <label for="inputNanme4" class="form-label">Tarif</label>
                      <input type="number" value="{{ $item['tarif'] }}" name="tarif" class="form-control @error('tarif') is-invalid  @enderror" id="inputNanme4" required>
                      <div class="invalid-feedback">Veuillez entrer un tarif</div>
    
                      @error('tarif')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    
                    </div>
  
                    <div class="col-12">
                      <textarea name="description" class="tinymce-editor">
                         {{ $item['description'] }}
                        </textarea><!-- End TinyMCE Editor -->
                    </div>
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire edit livraison -->
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