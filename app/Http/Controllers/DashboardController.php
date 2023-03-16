<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(Route::currentRouteName());
        if (Auth::check()) {

            $nombre_client = User::where('role', 'client')->get()->count();

            //nombre de visiteur

            $filter_visiteur = request('vente');

            $visiteur = DB::table('sessions')
            ->when( $filter_visiteur=='annee',
                fn($q)=>$q->whereYear('created_at', Carbon::now()->year)
            )
            ->when(
                $filter_visiteur == 'mois',
                fn ($q)
                => $q->whereMonth('created_at', Carbon::now()->month),
            )

            ->when(
                $filter_visiteur == 'jour',
                fn ($q)
                => $q->whereDay('created_at', Carbon::now()->day)
            )



            ->get()->count();

            //commande par temps
            $filter = request('vente');
            $nombre_commande = Commande::when(
                $filter == 'annee',
                fn ($q)
                => $q->whereYear('created_at', Carbon::now()->year)
            )
                ->when(
                    $filter == 'mois',
                    fn ($q)
                    => $q->whereMonth('created_at', Carbon::now()->month),
                )

                ->when(
                    $filter == 'jour',
                    fn ($q)
                    => $q->whereDay('created_at', Carbon::now()->day)
                )
                ->get()->count();


            //commande par status livre
            $filter = request('vente');
            $nombre_commande_livre = Commande::when(
                $filter == 'annee',
                fn ($q)
                => $q->whereYear('created_at', Carbon::now()->year)
                    ->whereStatus('livre')
            )
                ->when(
                    $filter == 'mois',
                    fn ($q)
                    => $q->whereMonth('created_at', Carbon::now()->month)
                        ->whereStatus('livre')
                )

                ->when(
                    $filter == 'jour',
                    fn ($q)
                    => $q->whereDay('created_at', Carbon::now()->day)
                        ->whereStatus('livre')
                )
                ->whereStatus('livre')
                ->get()->count();


            //commande par status attente
            $filter = request('vente');
            $nombre_commande_attente = Commande::when(
                $filter == 'annee',
                fn ($q)
                => $q->whereYear('created_at', Carbon::now()->year)
                    ->whereStatus('attente')
            )
                ->when(
                    $filter == 'mois',
                    fn ($q)
                    => $q->whereMonth('created_at', Carbon::now()->month)
                        ->whereStatus('attente')
                )

                ->when(
                    $filter == 'jour',
                    fn ($q)
                    => $q->whereDay('created_at', Carbon::now()->day)
                        ->whereStatus('attente')
                )
                ->whereStatus('attente')
                ->get()->count();


            //nombre de produits
            $nombre_produit = Produit::get()->count();

            //liste des commandes en attente
            $commande = Commande::with(['produits', 'livraison', 'users'])
                ->whereStatus('attente')
                ->whereDay('created_at', Carbon::now()->day)
                ->orderBy('created_at', 'desc')->get();


            return view('admin.pages.index', compact([
                'nombre_commande_livre',
                'nombre_commande_attente',
                'nombre_commande',
                'nombre_produit',
                'nombre_client',
                'commande',
                'visiteur'

            ]));
        } else {
            return redirect('admin/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
