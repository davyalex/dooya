<?php

namespace App\Providers;

use App\Models\Produit;
use App\Models\Section;
use App\Models\Category;
use App\Models\CategoryPack;
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

        $category_pack = CategoryPack::with('packs')->orderBy('title','asc')->get();
        $sous_category = SousCategory::with(['categorie','produits'])->get();
        $category = Category::with(['sous_categories','produits'])->get();
        $section = Section::with('produits')->get();

        View::composer('*', function ($view) use ($category, $sous_category,$category_pack,$section) {
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
        });
        
    }
}
