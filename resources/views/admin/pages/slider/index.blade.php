@extends('admin.layout')
@section('title', 'Slider')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

             <!-- Formulaire add  slider -->
            <h5 class="card-title">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-plus"></i>
            Ajouter un slider
            </button></h5>
            <div class="modal fade" id="basicModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ajouter un  slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3 needs-validation" method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12">
                    <label for="inputNumber" class="form-label">Image du slider <br> <span> Taille image(L:580px / h:189px)</span></label>
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
            </div> <!-- Formulaire add  slider -->



            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">image</th>
                  <th scope="col">Title</th>
                  <th scope="col">date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($slider as $key =>$item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>

                  <td>  <img
                    src="{{ $item ->getFirstMediaUrl('image') }}"
                    alt="{{ $item ->getFirstMediaUrl('image') }}"
                    style="width: 45px; height: 45px"
                    class=""
                    /></td>
                  <td>{{ $item['title'] }}</td>
                  <td> {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</td>

                  <td>
                   <div class="d-flex">
                    <a href="{{ route('accueil') }}"  role="button" class="btn btn-warning rounded-circle"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('slider.edit',$item['id']) }}" role="button" data-id = {{ $item['id'] }} data-bs-toggle="modal" data-bs-target="#basicModalEdit{{ $item['id'] }}" class="btn btn-success rounded-circle mx-2 "><i class="bi bi-pencil"></i></a>
                    
                    <form  action="{{ route('slider.delete',$item->id) }}" method="POST">
                      @csrf
                      <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash "></i> </a>
                     @include('admin.partials.deleteConfirm')
                    </form>
                   </div>
                    
                  </td>
                </tr>
                            <!-- start Formulaire edit  slider -->
            <div class="modal fade" id="basicModalEdit{{ $item['id'] }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modifier une  slider </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Vertical Form -->
              <form class="row g-3" method="post" action="{{ route('slider.update',$item['id']) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $item['title'] }}" class="form-control" id="inputNanme4">
                  </div>
                  <div class="col-12 mt-2">
                      <label for="inputNumber" class="form-label">Image de l'actualité</label>
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
            </div> <!-- Formulaire edit  slider -->
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