<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Category;
use App\Models\SousCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::with([
            'sous_categories'
            => fn ($q) => $q->orderBy('updated_at', 'desc'), 'produits'
        ])->orderBy('position', 'asc')->get();

        return view('admin.pages.categorie.index', compact('category'));
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',
        ]);
        $position = Category::get()->count();

        $code = Str::random(10);
        $category = Category::firstOrCreate([
            'code' => $code,
            'title' => $request->title,
            'position' => $position + 1,

        ]);

        Alert::toast('enregistré avec success', 'success');

        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $slug)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        $position = Category::whereSlug($slug)->first();
        $position_actuelle =  $position['position']; //position de la category entrant avant modification

        $position_select = Category::wherePosition($request['position'])->first();

        $category_update = tap(Category::whereSlug($slug))->update([
            'title' => $request->title,
            'position' => $request->position,
        ]);

        $CategoryPack_update2 = tap(Category::whereId($position_select['id']))->update([
            'position' => $position_actuelle,
        ]);

        Alert::toast('modifié avec success', 'success');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = Category::find($id)->delete();
        SousCategory::where('category_id', $id)->delete();
        Produit::where('category_id', $id)->delete();

        Alert::toast('supprimé avec success', 'success');

        return redirect()->route('category');
    }
}
