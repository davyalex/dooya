@extends('admin.layout')
@section('title', 'Slider')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add  publicite -->
            <h5 class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i>
            Ajouter une publicité
            </button></h5>
            
            <div class="modal fade" id="basicModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ajouter une  publicite</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('publicite.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="col-12">
                    <label class="form-label">Section</label>
                      <select aria-placeholder="selectionner" name="section" class="form-select  @error('category') is-invalid @enderror" aria-label="Default select example" required>
                        <option disabled selected></option>
                        @foreach ($section_pub as $value)
                        <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Veuillez choisir une section</div>
                  </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                    <label for="inputNumber" class="form-label">Image du publicite <br> <span> Taille image(L:1920px / h:409px)</span></label>
                      <input class="form-control" name="image" type="file" id="formFile" required>
                      <div class="invalid-feedback">Veuillez ajouter une image</div>
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire add  publicite -->



            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Section</th>
                  <th scope="col">date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($publicite as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>

                  <td>  <img
                    src="{{ $item ->getFirstMediaUrl('image') }}"
                    alt="{{ $item ->getFirstMediaUrl('image') }}"
                    style="width: 45px; height: 45px"
                    class=""
                    /></td>
                  <td>{{ $item['title'] }}</td>
                  <td>{{ $item['section']['title'] }}</td>

                  <td> {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</td>

                  <td>
                   <div class="d-flex">
                    <a href="{{ route('accueil') }}"  role="button" class="btn btn-warning rounded-circle"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('publicite.edit',$item['id']) }}" role="button" data-id = {{ $item['id'] }} data-bs-toggle="modal" data-bs-target="#basicModalEdit{{ $item['id'] }}" class="btn btn-success rounded-circle mx-2 "><i class="bi bi-pencil"></i></a>
                    
                    <form  action="{{ route('publicite.delete',$item->id) }}" method="POST">
                      @csrf
                      <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash "></i> </a>
                     @include('admin.partials.deleteConfirm')
                    </form>
                   </div>
                    
                  </td>
                </tr>
                            <!-- start Formulaire edit  publicite -->
            <div class="modal fade" id="basicModalEdit{{ $item['id'] }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modifier une  publicite </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3" method="post" action="{{ route('publicite.update',$item['id']) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label class="form-label">Section</label>
                      <select aria-placeholder="selectionner" name="section" class="form-select  @error('category') is-invalid @enderror" aria-label="Default select example" required>
                        <option disabled selected></option>
                        @foreach ($section_pub as $value)
                        <option value="{{ $value['id'] }}" {{ $value['id']==$item['section_id'] ?'selected': '' }} >{{ $value['title'] }}</option>
                        <div class="invalid-feedback">Veuillez choisir une section</div>
                        @endforeach
  
                      </select>
                      @error('category')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $item['title'] }}" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-12 mt-2">
                      <label for="inputNumber" class="form-label">Image du publicite</label>
                        <input class="form-control" name="image" type="file" id="formFile">

                        <div>
                            <img
                            src="{{ $item ->getFirstMediaUrl('image') }}"
                            alt="{{ $item ->getFirstMediaUrl('image') }}"
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                        </div>
                    </div>
                <div class="text-center mt-2">
                  <button type="submit" class="btn btn-primary">Valider</button>
                </div>
              </form><!-- Vertical Form -->
                  </div>
                </div>
              </div>
            </div> <!-- Formulaire edit  publicite -->
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