<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\SousCategory;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $produit = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pages.produit.index', compact('produit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.pages.produit.create');
    }

    public function loadsubCat($id)
    {
        //
        $data = SousCategory::where('category_id', $id)->get();

        return response()->json($data);
    }

    public function deleteImage($id)
    {
        //
        $delete = DB::table('media')->whereId($id)->delete();

        return response()->json("suppression réussi");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => '',
            'prix' => 'required',
            'prix_promo' => '',
            'date_fin_promo' => '',
            'couleur' => '',
            'stock' => '',
            'disponibilite' => '',
            'description' => '',
            'category' => 'required',
            'section' => 'required',

            // 'images' => 'required',
        ]);
       
        $code = Str::random(10);

        $section  = $request->section;
        // dd( $section);
        $produit = produit::create([
            'code' => $code,
            'title' =>  $request['title'],
            'prix' => $request['prix'],
            'prix_promo' => $request['prix_promo'],
            'date_debut_promo' => $request['date_debut_promo'],
            'date_fin_promo' => $request['date_fin_promo'],
            'couleur' => $request['couleur'],
            'stock' => $request['stock'],
            'disponibilite' => 'disponible',
            'description' => $request['description'],
            'category_id' => $request['category'],
            'sous_category_id' => $request['sous_category'],
            // 'user_id' => Auth::user()->id,

        ]);
// $produitId = Produit::find($produit->id);
                
for ($i=0; $i <count($section) ; $i++) { 
    DB::table('produit_section')->insert([
        'section_id'=>$section[$i],
        'produit_id'=>$produit->id,
    ]);

}
$produit->sections()->sync($request->section);



        if ($request->date_fin_promo && $request->date_fin_promo && $request->prix_promo) {
            Produit::find($produit->id)->update([
                "promotion" => 1,
            ]);
        }


        if ($request->file('files')) {
            foreach ($request->file('files') as $image) {
                $produit->addMedia($image)
                    ->toMediaCollection('image');
            }
        }


        Alert::toast('enregistré avec success', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        //
        $produit = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
            ->whereCode($code)
            ->first();

                $image = [];
            foreach ( $produit->media as $item) {
               $images =  $item;
               array_push($image,$images);
            }
            // dd($image);
            // $getSection =  $produit->sections();
            $getSection = [];
            foreach ( $produit->sections as $item) {
               $section =  $item;
               array_push($getSection,$section);
            }
            // dd( $getSection);
        return view('admin.pages.produit.edit', compact('produit','image','getSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduitRequest  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'prix' => 'required',
            'prix_promo' => '',
            'date_fin_promo' => '',
            'couleur' => '',
            'stock' => '',
            'disponibilite' => '',
            'description' => '',
            'category' => 'required',
            'section' => 'required',

            // 'images' => 'required',
        ]);

        // dd($request->file('image'));

    //   dd(  $section  = $request['section']);
        $produit = tap(Produit::find($id))->update([
            'title' =>  $request['title'],
            'prix' => $request['prix'],
            'prix_promo' => $request['prix_promo'],
            'date_debut_promo' => $request['date_debut_promo'],
            'date_fin_promo' => $request['date_fin_promo'],
            'couleur' => $request['couleur'],
            'stock' => $request['stock'],
            'disponibilite' => 'disponible',
            'description' => $request['description'],
            'category_id' => $request['category'],
            'sous_category_id' => $request['sous_category'],
                        // 'user_id' => Auth::user()->id,

        ]);
        $produit->sections()->sync($request->section);


        // for ($i=0; $i <count($section) ; $i++) { 
        //     DB::table('produit_section')->where('produit_id',$produit->id)->update([
        //         'section_id'=>$section[$i],
        //         'produit_id'=>$produit->id,
        //     ]);}

        if ($request->date_fin_promo && $request->date_fin_promo && $request->prix_promo) {
            Produit::find($produit->id)->update([
                "promotion" => 1,
            ]);
        }

        if ($request->file('files')) {
            // $produit->clearMediaCollection('image');
            foreach ($request->file('files') as $image) {
                $produit->addMedia($image)
                    ->toMediaCollection('image');
            }
        }

       
        $produit = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
            ->orderBy('created_at', 'desc')
            ->get();

        Alert::toast('modifié avec success', 'success');

        return view('admin.pages.produit.index', compact('produit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Produit::find($id)->delete();
        $delete = DB::table('media')->where('model_id', $id)->delete();
        Alert::toast('supprimé avec success', 'success');
        return redirect()->route('produit');
    }
}
