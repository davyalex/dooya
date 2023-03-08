<?php

namespace App\Providers;

use App\Models\Produit;
use App\Models\Section;
use App\Models\Category;
use App\Models\CategoryPack;
use App\Models\Livraison;
use App\Models\SousCategory;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
      
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
            /**supprimer les produit sans category et sous_category */
            // $delete_produit = Produit::whereNull('category_id')
            // ->WhereNull('sous_category_id') ->delete();

        $category_pack = CategoryPack::with('packs')->orderBy('position','asc')->get();
       
        $sous_category = SousCategory::with(['categorie','produits'])->orderBy('updated_at','desc')->get();
       
        $category = Category::with(['sous_categories'
        =>fn($q)=>$q->orderBy('updated_at','desc')
        ,'produits'])->orderBy('position','asc')->get();
       
        $section = Section::with('produits')->orderBy('title','asc')->get();
       
        $livraison = Livraison::with('commandes')
        ->whereNull('parent_lieu')
        ->orderBy('lieu', 'asc')->get();

        $commune = Livraison::with('commandes')
        ->whereNotNull('parent_lieu')
        ->orderBy('lieu', 'Asc')->get();


        View::composer('*', function ($view) use ($category, $sous_category,$category_pack,$section,$livraison,$commune) {
            $view->with([
                'category'=>$category,
            ]);

            $view->with([
                'section'=>$section,
            ]);

            $view->with([
                'sous_category'=>$sous_category,
            ]);

            $view->with([
                'category_pack'=>$category_pack,
            ]);

            $view->with([
                'livraison'=>$livraison,
            ]);

            $view->with([
                'commune'=>$commune,
            ]);
        });
        
    }
}
