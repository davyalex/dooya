@extends('admin.layout')
@section('title', 'Accueil')

@section('content')
<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filtrer</h6>
                  </li>

                  <li><a class="dropdown-item" href="/admin?vente=jour">Jour</a></li>
                  <li><a class="dropdown-item" href="/admin?vente=mois">Mois</a></li>
                  <li><a class="dropdown-item" href="/admin?vente=annee">Année</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Commandes <span>| Jour</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart-check"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombre_commande }}</h6>
                    <span class="text-primary  pt-1 fw-bold">{{ $nombre_commande_attente }} En attentes </span> |
                    <span class="text-success  pt-1 fw-bold">{{ $nombre_commande_livre }} Livrées</span> 

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  {{-- <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li> --}}

                  {{-- <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li> --}}
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Produits </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombre_produit }}</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-md-4">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul> --}}
              </div>

              <div class="card-body">
                <h5 class="card-title">Clients</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $nombre_client }}</h6>
                    {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <div class="col-xxl-4 col-md-12">
               <!-- News & Updates Traffic -->
              <div class="card">
                  <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                  </div>

                  <div class="card-body pb-0">
                  <h5 class="card-title">Commandes en attentes du jour ({{ $commande->count() }})</h5>

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
                           <a href="{{ route('facture-user',$item['id']) }}"  role="button" class="btn btn-warning rounded-circle mx-2"><i class="bi bi-eye"></i></a>
      
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
                  </div>
              </div><!-- End News & Updates -->

          </div>

        </div>
      </div><!-- End Left side columns -->
    </div>
  </section>
    
@endsection
    
