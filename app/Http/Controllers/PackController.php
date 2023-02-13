<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePackRequest;
use App\Http\Requests\UpdatePackRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pack = Produit::with(['category_pack','media'])
            ->where('type_produit','pack')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.pages.pack.index',compact('pack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.pack.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePackRequest  $request
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
            'stock' => '',
            'disponibilite' => '',
            'description' => '',
            'category' => 'required',

            // 'images' => 'required',
        ]);
       
        $code = Str::random(10);

        $pack = Produit::create([
            'code' => $code,
            'title' =>  $request['title'],
            'prix' => $request['prix'],
            'prix_promo' => $request['prix_promo'],
            'date_debut_promo' => $request['date_debut_promo'],
            'date_fin_promo' => $request['date_fin_promo'],
            'stock' => $request['stock'],
            'disponibilite' => 'disponible',
            'type_produit' => 'pack',
            'description' => $request['description'],
            'category_pack_id' => $request['category'],
            // 'user_id' => Auth::user()->id,

        ]);
                
        if ($request->date_fin_promo && $request->date_fin_promo && $request->prix_promo) {
            Produit::find($pack->id)->update([
                "promotion" => 1,
            ]);
        }


        if ($request->file('files')) {
            foreach ($request->file('files') as $image) {
                $pack->addMedia($image)
                    ->toMediaCollection('image');
            }
        }


        Alert::toast('enregistré avec success', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        //
        $pack = Produit::with(['category_pack', 'media'])
            ->whereCode($code)
            ->first();

                $image = [];
            foreach ( $pack->media as $item) {
               $images =  $item;
               array_push($image,$images);
            }
         
            // dd( $getSection);
        return view('admin.pages.pack.edit', compact('pack','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackRequest  $request
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'title' => '',
            'prix' => 'required',
            'prix_promo' => '',
            'date_fin_promo' => '',
            'stock' => '',
            'disponibilite' => '',
            'description' => '',
            'category' => 'required',
        ]);

        // dd($request->file('image'));

    //   dd(  $section  = $request['section']);
        $pack = tap(Pack::find($id))->update([
            'title' =>  $request['title'],
            'prix' => $request['prix'],
            'prix_promo' => $request['prix_promo'],
            'date_debut_promo' => $request['date_debut_promo'],
            'date_fin_promo' => $request['date_fin_promo'],
            'stock' => $request['stock'],
            'disponibilite' => 'disponible',
            'type_produit' => 'pack',
            'description' => $request['description'],
            'category_pack_id' => $request['category'],

        ]);

        if ($request->date_fin_promo && $request->date_fin_promo && $request->prix_promo) {
            Produit::find($pack->id)->update([
                "promotion" => 1,
            ]);
        }else{
            Pack::find($pack->id)->update([
                "promotion" => 0,
            ]);
        }

        if ($request->file('files')) {
            // $pack->clearMediaCollection('image');
            foreach ($request->file('files') as $image) {
                $pack->addMedia($image)
                    ->toMediaCollection('image');
            }
        }

       
        $pack = Pack::with(['category_pack', 'media'])
            ->orderBy('created_at', 'desc')
            ->get();

        Alert::toast('modifié avec success', 'success');

        return redirect() ->route('pack');
        // return view('admin.pages.pack.index', compact('pack'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $delete = Pack::find($id)->delete();
        $delete = DB::table('media')->where('model_id', $id)->delete();
        Alert::toast('supprimé avec success', 'success');
        return redirect()->route('pack');
    }



    public function deleteImage($id)
    {
        //
        $delete = DB::table('media')->whereId($id)->delete();

        return response()->json("suppression réussi");
    }
}
