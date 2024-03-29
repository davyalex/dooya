<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Barryvdh\DomPDF\PDF;
use App\Models\Livraison;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //recuperation des commandes pour admin
        if (Auth::check()) {
            $status = request('status');

            $commande = Commande::with(['produits', 'livraison', 'users'])
                ->when($status == 'attente', function ($q) {
                    return $q->whereStatus('attente');
                })
                ->when($status == 'livre', function ($q) {
                    return $q->whereStatus('livre');
                })
                ->orderBy('created_at', 'desc')->get();

                $user = User::with('roles')->get();
            return view('admin.pages.commande.index', compact('commande','user'));
        }
    }

    //recuperation des commandes du client
    public function mes_commandes()
    {

        $commande = Commande::where('user_id',Auth::user()->id)
        ->orderBy('created_at','desc')->paginate(10);
        return view('site.pages.user_panel.commande',compact('commande'));

    }


       //recuperation des commandes du client
       public function facture_user($id)
       {
        $facture = Commande::with(['produits', 'livraison', 'users'])
        ->whereId($id)->get();
        // dd( $facture);
        $user = User::with('roles')->where('role','!=','client')->get();
        
           return view('site.pages.user_panel.facture',compact('facture','user'));
   
       }

        public function bon_livraison($id){
            $detail = Commande::with(['produits', 'livraison', 'users'])
            ->whereId($id)->get();
            
            return view('admin.pages.commande.bon_livraison',compact('detail'));
        }


        // public function print_bon_livraison($id){
        //     $detail = Commande::with(['produits', 'livraison', 'users'])
        //     ->whereId($id)->get();
        //     $detail = Commande::with(['produits', 'livraison', 'users'])
        //     ->whereId($id)->get();
            
        //     $pdf = PDF::loadView('admin.pages.commande.print_bon_livraison', $detail);
     
        //     return $pdf->download($detail->code.'pdf');
        // }




       public function annuler_facture($id){
        $cancel = Commande::find($id)->delete();
        DB::table('commande_produit')->where('commande_id',$id)->delete();
        Alert::Success('Commande annulé avec success');
        return back();

       }








    public function change_status(Request $request, $id)
    {
        $status  = tap(Commande::find($id))->update(['status' => $request['status']]);
        Alert::toast('Status modifié avec modifié avec success', 'success');
        return back();
    }





    public function checkout(Request $request)
    {

        if (Auth::check()) {
            if ($request->session()->has('cart')) {
                $cart_detail = $request->session()->get('cart');
            }
            // dd($cart_detail);
            return view('site.pages.checkout', compact('cart_detail'));
        } else {
            return redirect('se-connecter');
        }
        
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
        if (Auth::check()) {
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
            $nombre_produit = 0;
            foreach ($cart_detail as $value) {
                $id = $value['id'];
                $quantite = $value['quantite'];
                $prix_unitaire = $value['prix'];
                $prix_quantite = $value['prix'] * $value['quantite'];
                $nombre_produit = $nombre_produit += $value['quantite'];
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


            if ($request->session()->has('cart')) {

                //insertion database
                $code = Str::random(10);
                $commande = Commande::firstOrCreate([
                    'code' => $code,
                    'nombre_produit' => $nombre_produit,
                    'sous_total' => $sous_total,
                    'tarif_livraison' => $tarif_livraison,
                    // 'livraison_precis'=>$livraison_precis,
                    'livraison_id' => $IdLivraison,
                    'user_id' => Auth::user()->id,
                    'montant_total' => $montant_total,
                    'status' => 'attente',

                ]);

                //insertion pivot (attachMethod)

                foreach ($cmd as  $value) {
                    $commande->produits()->attach($value['id'], [
                        'quantite' => $value['quantite'],
                        'prix_unitaire' => $value['prix_unitaire'],
                        'total' => $value['prix_quantite'],
                    ]);
                }


                $request->session()->forget('cart');
            }

            return response()->json([
                'success' => 'commande passée avec success',
                'commande' => $commande,

            ], 200);
        } else {
            return redirect()->route('login-user');
        }
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
