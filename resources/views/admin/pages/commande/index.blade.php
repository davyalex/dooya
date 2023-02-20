@extends('admin.layout')
@section('title', 'Commande')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Liste des commandes</h5>

            <h5 class="text-primary text-center">Nombre Total: {{ $commande ->count() }} commandes</h5>

            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Code</th>
                  <th scope="col">Client</th>
                  <th scope="col">Montant</th>
                  <th scope="col">Lieu</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($commande as $key=> $item)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $item['code'] }}
                   <br> 
                    @if ($item['status']=='attente' )
                    <span class="badge bg-primary">Comande en attente</span>
                    @elseif ($item['status']=='livre' )
                   <span class="badge bg-success">Commande livrée</span>
                    @endif
                  </td>
                  <td>
                    <span>{{ $item['users']['name'] }}</span><br>
                    <span>{{ $item['users']['phone'] }}</span>
                  </td>
                  <td>{{ number_format($item['montant_total'],0)  }} FCFA</td>
                  <td>
                    <span>{{ $item['livraison']['lieu'] }}</span><br>
                    <span>{{ number_format($item['livraison']['tarif'],0)  }} FCFA</span>
                  </td>
                  <td> {{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}
                    <br>  <span>{{ \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y') }}</span>
                  </td>

                  <td>
                    <div class="d-flex">
                     <a href="{{ route('facture-user',$item['id']) }}"  role="button" class="btn btn-warning rounded-circle mx-2 bs-tooltip" title="Detail de la commande"><i class="bi bi-eye"></i></a>

                     <a href="{{ route('bon-livraison',$item['id']) }}"  role="button" class="btn btn-secondary rounded-circle"><i class="bi bi-file-earmark-check"></i></a>

                     <a href="{{ route('change-status',$item['id']) }}" role="button" data-id = {{ $item['id'] }} data-bs-toggle="modal" data-bs-target="#basicModalStatus{{ $item['id'] }}" class="btn btn-success rounded-circle mx-2 "><i class="bi bi-bicycle"></i></a>
                     <form  action="{{ route('annuler-facture',$item->id) }}" method="GET">
                       @csrf
                       <a  class="btn btn-danger rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item->id }}"><i class="bi bi-trash"></i> </a>
                      @include('admin.partials.deleteConfirm')
                     </form>
                    </div>

                   
                     
                   </td>

                </tr>

                <div class="modal fade" id="basicModalStatus{{ $item['id'] }}" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier le status livraison </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                         <!-- Vertical Form -->
                  <form class="row g-3" method="post" action="{{ route('change-status',$item['id']) }}">
                    @csrf
                      <div class="col-12">
                          <label for="inputNanme4" class="form-label">Status de la commande</label>
                              <select name="status" id="" class="form-control" required>
                                <option disabled value selected>Sélectionner</option>
                                <option value="livre">Commande livrée</option>
                                <option value="attente">Commande en attente</option>
                              </select>
                          <div class="invalid-feedback">Choisissez un status</div>
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