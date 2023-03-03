@extends('admin.layout')
@section('title', 'Livraison')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add sous_category -->
            <h5 class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i>
            Ajouter une commune
            </button></h5>
            <div class="modal fade" id="basicModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ajouter une commune</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('commune.store') }}" novalidate>
                @csrf
                <div class="col-12">
                    <label class="form-label">Ville</label>
                      <select name="ville" class="form-select " aria-label="Default select example" required>
                        <option disabled selected></option>
                        @foreach ($ville as $item)
                        <option value="{{ $item['lieu'] }}">{{ $item['lieu'] }}</option>
                        @endforeach
                        
                      </select>
                      <div class="invalid-feedback">Veuillez sélectionner une ville</div>
                  </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Commune</label>
                  <input type="text" name="commune" class="form-control" id="inputNanme4" required>
                  <div class="invalid-feedback">Veuillez entrer une commune</div>
                </div>


                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Tarif</label>
                    <input type="number"  name="tarif" class="form-control" id="inputNanme4" required>
                    <div class="invalid-feedback">Veuillez entrer un tarif</div>
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
                  <th scope="col">Ville</th>
                  <th scope="col">Commune</th>
                  <th scope="col">Tarif</th>
                  <th scope="col">date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($commune as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $item['parent_lieu']}}</td>
                  <td>{{ $item['lieu'] }}</td>
                  <td>{{ number_format($item['tarif'], 0,',', ' ') }}</td>
                  <td> {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</td>

                
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
                            <!-- start Formulaire edit sous_category -->
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
                    
                                      {{-- <div class="col-12">
                                        <textarea name="description" class="tinymce-editor">
                                           {{ $item['description'] }}
                                          </textarea><!-- End TinyMCE Editor -->
                                      </div> --}}
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