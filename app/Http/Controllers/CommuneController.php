<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class communeController extends Controller
{
    //
    public function commune()
    {
        $ville = Livraison::with('commandes')
            ->whereNull('parent_lieu')
            ->orderBy('lieu', 'Asc')->get();

        $commune = Livraison::with('commandes')
            ->whereNotNull('parent_lieu')
            ->orderBy('lieu', 'Asc')->get();
        // dd($livraison->toArray());
        return view('admin.pages.livraison.commune', compact('ville', 'commune'));
    }

    public function commune_store(Request $request)
    {
        $code = Str::random(10);
        $Livraison = Livraison::firstOrCreate([
            'code' => $code,
            'lieu' => $request->commune,
            'parent_lieu' => $request->ville,
            'tarif' => $request->tarif,
        ]);

        Alert::toast('enregistré avec success', 'success');

        return back();
    }
}
