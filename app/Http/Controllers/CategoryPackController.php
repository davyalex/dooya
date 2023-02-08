<?php

namespace App\Http\Controllers;
use App\Models\CategoryPack;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CategoryPackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category_pack = CategoryPack::with('packs')->get();
        return view('admin.pages.pack.category_pack', compact('category_pack'));
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
     * @param  \App\Http\Requests\StoreCategoryPackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        $request->validate([
            'title' => 'required',
        ]);
        $code = Str::random(10);
        $CategoryPack = CategoryPack::firstOrCreate([
            'title' => $request->title,
            'code' => $code ,
        ]);
        
        Alert::toast('enregistré avec success', 'success');

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryPack  $CategoryPack
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryPack $CategoryPack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryPack  $CategoryPack
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPack $CategoryPack, $slug)
    {
        //
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryPackRequest  $request
     * @param  \App\Models\CategoryPack  $CategoryPack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        $CategoryPack_update = tap(CategoryPack::whereSlug($slug))->update([
            'title' => $request->title,
        ]);

        Alert::toast('modifié avec success', 'success');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryPack  $CategoryPack
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = CategoryPack::find($id)->delete();
        Alert::toast('supprimé avec success', 'success');

        return redirect()->route('category_pack');
    }
}
