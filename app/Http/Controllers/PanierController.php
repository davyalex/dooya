<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use RealRashid\SweetAlert\Facades\Alert;

class PanierController extends Controller
{


    //

    public function cart(Request $request)
    {
        if(request('produit')){
            $produit = Produit::whereId(request('produit'));
            return view('site.pages.panier',compact('produit'));

        }
        return view('site.pages.panier');
    }

    //
    public function addToCart($id)
    {
        $produit = Produit::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantite']++;
        } else {
            $cart[$id] = [
                "id"=>$id,
                "title" => $produit->title,
                "quantite" => 1,
                "prix" => $produit->prix,
                "image" => $produit->media[0]->getUrl()
            ];
        }
        session()->put('cart', $cart);
        $countCart = '<span class="total-pro">'
            . count((array) session('cart')) .
            '</span>';
        $qte = '<span class="pro-quantity">' . $cart[$id]['quantite'] . '</span>';
        $price = '<span class="cart-price">' . $cart[$id]['prix'] . '</span>';
        $image = $cart[$id]['image'];
        // $image = '<img  src="'.$cart[$id]['image'].'" class="img-cart" alt="cart-image">';



        //getTotal
      $total = 0 ;
        $count =  session('cart');
        foreach($count as $id => $details){
            $total += $details['prix'] * $details['quantite'] ;
        }

       $total =  '<li class="get-total">Total <span>'.$total.' FCFA</span></li>';

           
      
        // Alert::toast('Produit ajouté au panier avec success', 'success');
        return response()->json([
            'countCart' => $countCart,
            'qte' => $qte,
            'price' => $price,
            'image' => $image,
            'total'=> $total,


        ]);
        // return redirect()->back();
    }

    //
    public function update(Request $request)

    {

        if ($request->id && $request->quantite) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantite"] = $request->quantite;

            session()->put('cart', $cart);

            Alert::toast('Produit modifié avec success', 'success');
        }
    }

    //
    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            Alert::toast('Produit supprimé du panier avec success', 'success');
        }
    }
}
