<?php

namespace App\Http\Controllers;
use App\Models\Livraison;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $livraison = Livraison::with('commandes')->get();
        return view('admin.pages.livraison.index', compact('livraison'));
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
     * @param  \App\Http\Requests\StoreLivraisonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        $request->validate([
            'lieu' => 'required|unique:livraisons',
            'tarif' =>'required',
            'description' =>''
        ]);
        $code = Str::random(10);
        $Livraison = Livraison::firstOrCreate([
            'code' => $code,
            'lieu' => $request->lieu,
            'tarif' => $request->tarif,
            'description' => $request->description,
        ]);
        
        Alert::toast('enregistré avec success', 'success');

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livraison  $Livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $Livraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livraison  $Livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $Livraison, $slug)
    {
        //
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLivraisonRequest  $request
     * @param  \App\Models\Livraison  $Livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$code)
    {
        //
        $request->validate([
            'lieu' => 'required',
            'tarif' =>'required',
            'description' =>''


        ]);

        $Livraison_update = tap(Livraison::whereCode($code))->update([
            'lieu' => $request->lieu,
            'tarif' => $request->tarif,
            'description' => $request->description,


        ]);

        Alert::toast('modifié avec success', 'success');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livraison  $Livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = Livraison::find($id)->delete();
        Alert::toast('supprimé avec success', 'success');

        return redirect()->route('livraison');
    }
}
