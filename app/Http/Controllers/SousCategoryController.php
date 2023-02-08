<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Support\Str;
use App\Models\SousCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SousCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sous_category = SousCategory::with(['categorie','produits'])->get();
        return view('admin.pages.sous_categorie.index', compact('sous_category'));
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
     * @param  \App\Http\Requests\StoreSousCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        $request->validate([
            'title' => 'required',
            'category' => 'required',

        ]);
        $code = Str::random(10);
        $SousCategory = SousCategory::firstOrCreate([
            'title' => $request->title,
            'code' => $code ,
            'category_id' => $request['category'] ,

        ]);
        
        Alert::toast('enregistré avec success', 'success');

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousCategory  $SousCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SousCategory $SousCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousCategory  $SousCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SousCategory $SousCategory, $slug)
    {
        //
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSousCategoryRequest  $request
     * @param  \App\Models\SousCategory  $SousCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        //
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);

        $SousCategory_update = tap(SousCategory::whereSlug($slug))->update([
            'title' => $request->title,
            'category_id' => $request->category,

        ]);

        Alert::toast('modifié avec success', 'success');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousCategory  $SousCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = SousCategory::find($id)->delete();
        Produit::where('sous_category_id',$id)->delete();
        Alert::toast('supprimé avec success', 'success');

        return redirect()->route('sous_category');
    }
}
