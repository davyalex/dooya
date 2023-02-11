<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PanierController extends Controller
{


    //

    public function cart()
    {
        return view('site.pages.panier');
    }

    //
    public function addToCart($id)
    {
        $produit = Produit::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantite']++;
        } else {
            $cart[$id] = [
                "title" => $produit->title,
                "quantite" => 1,
                "prix" => $produit->prix,
                "image" => $produit->media[0]->getUrl()
            ];
        }
          
        session()->put('cart', $cart);
        Alert::toast('Produit ajouté au panier avec success', 'success');

        return redirect()->back();
    }

    //
    public function update(Request $request)

    {

        if($request->id && $request->quantite){

            $cart = session()->get('cart');

            $cart[$request->id]["quantite"] = $request->quantite;

            session()->put('cart', $cart);

            Alert::toast('Produit modifié avec success', 'success');


        }

    }

    //
    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            Alert::toast('Produit supprimé du panier avec success', 'success');


        }
        

    }
    
}
