<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Livraison;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function checkout(Request $request)
    {

        if ($request->session()->has('cart')) {
            $cart_detail = $request->session()->get('cart');
        }
        // dd($cart_detail);
        return view('site.pages.checkout', compact('cart_detail'));
    }


    public function refresh_shipping(Request $request, $id)
    {
        $totalGet = $_GET['total'];
        $livraison = Livraison::find($id);
        $tarif = $livraison['tarif'];
        $total = number_format($totalGet + $tarif, 0);
        $livraison = ' <td><span class="shipping">' . $tarif . 'FCFA</span></td>';
        $total = '<td><span class="total_amount">' . $total . ' FCFA</span>';
        return response([
            'livraison' => $livraison,
            'total' => $total,

        ]);
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
     * @param  \App\Http\Requests\StoreCommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function finaliser_commande(Request $request)
    {

        //recuperation detail commande
        $data = $request->all();
        $IdLivraison = $data['livraison'];
        $sous_total = $data['sousTotal'];
        $total = $data['total'];

        //je recupere le montant de la livraison
        $livraison = Livraison::find($IdLivraison);
        $tarif_livraison = $livraison['tarif'];

        //tarif_livraison + total
        $montant_total = $total + $tarif_livraison;




        //recuperation detail du panier
        if ($request->session()->has('cart')) {
            $cart_detail = $request->session()->get('cart');
        }
        $cmd = [];
        $nombre_article = 0;
        foreach ($cart_detail as $value) {
            $id = $value['id'];
            $quantite = $value['quantite'];
            $prix_unitaire = $value['prix'];
            $prix_quantite = $value['prix'] * $value['quantite'];
            $nombre_article = $nombre_article += $value['quantite'];
            array_push(
                $cmd,
                [
                    "id" => $id,
                    "quantite" => $quantite,
                    "prix_unitaire" => $prix_unitaire,
                    "prix_quantite" => $prix_quantite
                ]
            );
        }

        //insertion database
        $code = Str::random(10);
        $commande = Commande::firstOrCreate([
            'code' => $code,
            'nombre_article' => $nombre_article,
            'sous_total' => $sous_total,
            'tarif_livraison' => $tarif_livraison,
            // 'livraison_precis'=>$livraison_precis,
            'livraison_id' => $IdLivraison,
            'user_id' => Auth::user()->id,
            'montant_total' => $montant_total,
            'status' => 'en-cour',

        ]);

        //insertion pivot (attachMethod)

        foreach ($cmd as  $value) {
            $commande->produits()->attach($value['id'], [
                'quantite' => $value['quantite'],
                'prix_unitaire' => $value['prix_unitaire'],
                'total' => $value['prix_quantite'],
            ]);
        }

        if ($request->session()->has('cart')) {
            $request->session()->flush('cart');
        }
        // Alert::toast('Votre commande a été validé avec success', 'success');
        // return redirect()->route('accueil');
        $url  = redirect()->route('accueil');
        return response()->json([
            'message' => 'commande passée avec success',
            'commande' => $commande,
            'url' => $url,

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandeRequest  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
