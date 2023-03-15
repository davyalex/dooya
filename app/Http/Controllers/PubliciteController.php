<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\publicite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorepubliciteRequest;
use App\Http\Requests\UpdatepubliciteRequest;

class PubliciteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_pub = Section::with(['produits','publicites'])
        ->whereType ('publicite')
        ->orderBy('title','asc')->get();
        $publicite = Publicite::with('media')->orderBy('created_at','desc')->get();
        return view('admin.pages.publicite.index',compact('publicite','section_pub' ));
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
     * @param  \App\Http\Requests\StorepubliciteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => '',
            'section' => 'required',
        ]);

        $publicite = Publicite::firstOrCreate([
            'title' => $request['title'],
            'section_id' => $request['section'],

        ]);

        if ($request->file('image')) {
            $publicite->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }


        Alert::toast('Publicite inseré avec success', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publicite  $publicite
     * @return \Illuminate\Http\Response
     */
    public function show(publicite $publicite)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publicite  $publicite
     * @return \Illuminate\Http\Response
     */
    public function edit(publicite $publicite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepubliciteRequest  $request
     * @param  \App\Models\publicite  $publicite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => '',
            'section' => 'required',

        ]);

        $publicite = tap(Publicite::find($id))->update([
            'title' => $request->title,
            'section_id' => $request->section,

        ]);

        if ($request->file('image')) {
            $publicite->clearMediaCollection('image');
            $publicite->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }


        Alert::toast('Publicité modifié avec success', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publicite  $publicite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Publicite::find($id)->delete();
        Alert::toast('supprimé avec success', 'success');
        return back();
    }
}
