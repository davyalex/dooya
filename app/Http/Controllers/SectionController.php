<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section = Section::with('produits')->get();
        return view('admin.pages.produit.section', compact('section'));
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
     * @param  \App\Http\Requests\StoreSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        $request->validate([
            'title' => 'required',
        ]);
        $code = Str::random(10);
        $Section = Section::firstOrCreate([
            'title' => $request->title,
            'code' => $code ,
        ]);
        
        Alert::toast('enregistré avec success', 'success');

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $Section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $Section, $slug)
    {
        //
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionRequest  $request
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        $Section_update = tap(Section::whereSlug($slug))->update([
            'title' => $request->title,
        ]);

        Alert::toast('modifié avec success', 'success');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = Section::find($id)->delete();
        Alert::toast('supprimé avec success', 'success');

        return redirect()->route('section');
    }
}
