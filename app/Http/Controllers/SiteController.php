<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Slider;
use App\Models\Produit;
use App\Models\Section;
use App\Models\Category;
use App\Models\CategoryPack;
use App\Models\SousCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pack = Produit::with(['category_pack', 'media'])
            ->where('type_produit', 'pack')
            ->orderBy('created_at', 'desc')
            ->get();

        $section = Section::with('produits')->get();

        $slider = Slider::with('media')->orderBy('created_at','desc')->get();
            
        return view('site.pages.accueil', compact(['pack', 'section','slider']));
    }


    public function shop(Request $request)
    {

        $req_cat = request('category');
        $req_catGet = Category::whereCode(request('category'))->first();

        $req_sousCat = request('sous_category');
        $req_sousCatGet = SousCategory::whereCode(request('sous_category'))->first();

        $req_section = request('section');
        $req_sectionGet = Section::whereCode(request('section'))->first();

        // $req_spack = request('pack');
        // $req_packGet = CategoryPack::whereCode(request('pack'))->first();



        $produit = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
            ->when($req_cat, function ($q) use ($req_catGet) {
                return $q->where('category_id', $req_catGet['id']);
            })


            ->when($req_sousCat, function ($q) use ($req_sousCatGet) {
                return $q->where('sous_category_id', $req_sousCatGet['id']);
            })->orderBy('created_at', 'desc')->paginate(20);


        if (request('section')) {
            $produit = Produit::whereHas('sections', function ($q) use ($req_sectionGet) {
                return $q->where('produit_section.section_id', $req_sectionGet['id']);
            })->orderBy('created_at', 'desc')->paginate(20);
        }


        // if (request('pack')) {
        //     $pack = Pack::with(['category_pack', 'media'])
        //         ->when($req_spack, function ($q) use ($req_packGet) {
        //             return $q->where('category_pack_id', $req_packGet['id']);
        //         })->get();
        //         return view('site.pages.shop', compact(['produit', 'req_catGet', 'req_sousCatGet', 'req_sectionGet','pack','req_packGet']));
        //     }

        // dd($produit);

        // ->when($req_section, function($q)use ($req_sectionGet) {
        //     return $q->with(['sections',function($q)use ($req_sectionGet)  {
        //         return $q->where('section_id',$req_sectionGet['id']);
        //     }]);
        // })->orderBy('created_at', 'desc')->paginate(20);


        return view('site.pages.shop', compact(['produit', 'req_catGet', 'req_sousCatGet', 'req_sectionGet']));
    }



    public function search(Request $request)
    {
        $search = $request['search'];

        if ($search) {
            $produit = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
                ->where('title', 'Like',"%{$search}%")
                ->orderBy('created_at', 'desc')->paginate(20);
                return view('site.pages.shop',compact('produit'));
        }else{
            return redirect('/boutique');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $produit_code = request('produit');

        if ($produit_code) {
            $produit = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
                ->when($produit_code, function ($q) use ($produit_code) {
                    return $q->whereCode($produit_code);
                })->first();


            //produit en relation
            $produit_related = Produit::whereCode($produit_code)->first();
            $catGet =  $produit_related->category_id;
            $produit_related = Produit::with(['category', 'media', 'sous_category', 'sections', 'commandes'])
                ->where('category_id', $catGet)
                ->where('id', '!=', $produit_related->id)
                ->orderBy('created_at', 'desc')->get();

            return view('site.pages.detail', compact('produit', 'produit_related'));
        }


        $pack_code = request('pack');
        $req_pack = CategoryPack::whereCode(request('pack'))->first();
        if ($pack_code) {
            $produit = Produit::with(['category_pack', 'media'])
                ->when($pack_code, function ($q) use ($req_pack) {
                    return $q->where('category_pack_id', $req_pack['id']);
                })->first();
        // dd( $produit);

            $produit_related = Produit::with(['category_pack', 'media'])
                ->whereNull('category_id')
                // ->where('code', '!=',  $produit->code)
                ->orderBy('created_at', 'desc')->get();


            return view('site.pages.detail', compact('produit', 'produit_related'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
