<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\PubliciteController;
use App\Http\Controllers\CategoryPackController;
use App\Http\Controllers\SousCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('site.pages.accueil');
// });
//LOGIN

Route::prefix('admin')->group(function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::get('login', [UserController::class, 'loginForm'])->name('login-form');
});



//Route admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    /**Post */
    Route::controller(DashboardController::class)->group(function () {
        Route::get('', 'index')->name('dashboard');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('', 'index')->name('user');
        Route::get('create', 'create')->name('user.create');
        Route::post('store', 'store')->name('user.store');
        Route::get('edit/{slug}', 'edit')->name('user.edit');
        Route::post('update/{id}', 'update')->name('user.update');
        Route::post('destroy/{id}', 'destroy')->name('user.delete');
        Route::get('lock/{id}', 'lock')->name('user.lock');
        Route::get('unlock/{id}', 'unlock')->name('user.unlock');
        Route::get('profil/{code}', 'profil')->name('user.profil');
        route::post('logout', 'logout_admin')->name('logout');
        route::post('newpassword/{id}', 'newpassword')->name('user.newpassword');
    });

    /**Category */
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('', 'index')->name('category');
        Route::post('store', 'store')->name('category.store');
        Route::get('edit/{slug}', 'edit')->name('category.edit');
        Route::post('update/{slug}', 'update')->name('category.update');
        Route::post('destroy/{id}', 'destroy')->name('category.delete');
    });

    /**Sous-Category */
    Route::controller(SousCategoryController::class)->prefix('sous_category')->group(function () {
        Route::get('', 'index')->name('sous_category');
        Route::post('store', 'store')->name('sous_category.store');
        Route::get('edit/{slug}', 'edit')->name('sous_category.edit');
        Route::post('update/{slug}', 'update')->name('sous_category.update');
        Route::post('destroy/{id}', 'destroy')->name('sous_category.delete');
    });


    /**CategoryPack */
    Route::controller(CategoryPackController::class)->prefix('category_pack')->group(function () {
        Route::get('', 'index')->name('category_pack');
        Route::post('store', 'store')->name('category_pack.store');
        Route::get('edit/{slug}', 'edit')->name('category_pack.edit');
        Route::post('update/{slug}', 'update')->name('category_pack.update');
        Route::post('destroy/{id}', 'destroy')->name('category_pack.delete');
    });


    /**Section */
    Route::controller(SectionController::class)->prefix('section')->group(function () {
        Route::get('', 'index')->name('section');
        Route::post('store', 'store')->name('section.store');
        Route::get('edit/{slug}', 'edit')->name('section.edit');
        Route::post('update/{slug}', 'update')->name('section.update');
        Route::post('destroy/{id}', 'destroy')->name('section.delete');
    });


    /**Livraison */
    Route::controller(LivraisonController::class)->prefix('livraison')->group(function () {
        Route::get('', 'index')->name('livraison');
        Route::post('store', 'store')->name('livraison.store');
        Route::get('edit/{code}', 'edit')->name('livraison.edit');
        Route::post('update/{code}', 'update')->name('livraison.update');
        Route::post('destroy/{id}', 'destroy')->name('livraison.delete');

        Route::get('commune', 'commune')->name('commune');
        Route::post('commune', 'commune_store')->name('commune.store');

    });


    

    // /**Commune */
    // Route::controller(CommuneController::class)->prefix('livraison')->group(function () {
    //     Route::get('commune', 'commune')->name('commune');
    //     Route::post('commune', 'commune_store')->name('commune.store');
    // });



    /**Produit */
    Route::controller(ProduitController::class)->prefix('produit')->group(function () {
        Route::get('', 'index')->name('produit');
        Route::get('create', 'create')->name('produit.create');
        Route::post('store', 'store')->name('produit.store');
        Route::get('edit/{code}', 'edit')->name('produit.edit');
        Route::post('update/{id}', 'update')->name('produit.update');
        Route::post('destroy/{id}', 'destroy')->name('produit.delete');
        Route::get('loadSubCat/{id}', 'loadsubCat');
        Route::get('deleteImage/{id}', 'deleteImage');
    });

    /**Pack */
    Route::controller(PackController::class)->prefix('pack')->group(function () {
        Route::get('', 'index')->name('pack');
        Route::get('create', 'create')->name('pack.create');
        Route::post('store', 'store')->name('pack.store');
        Route::get('edit/{code}', 'edit')->name('pack.edit');
        Route::post('update/{id}', 'update')->name('pack.update');
        Route::post('destroy/{id}', 'destroy')->name('pack.delete');
        Route::get('loadSubCat/{id}', 'loadsubCat');
        Route::get('deleteImage/{id}', 'deleteImage');
    });

    //slider
    route::controller(SliderController::class)->prefix('slider')->group(function(){
        route::get('index','index')->name('slider.index');
        route::post('store','store')->name('slider.store');
        Route::get('edit/{id}', 'edit')->name('slider.edit');
        Route::post('update/{id}', 'update')->name('slider.update');
        Route::post('destroy/{id}', 'destroy')->name('slider.delete');
    });

       //publicité
       route::controller(PubliciteController::class)->prefix('publicite')->group(function(){
        route::get('index','index')->name('publicite.index');
        route::post('store','store')->name('publicite.store');
        Route::get('edit/{id}', 'edit')->name('publicite.edit');
        Route::post('update/{id}', 'update')->name('publicite.update');
        Route::post('destroy/{id}', 'destroy')->name('publicite.delete');
    });
});





/**Site */
Route::controller(SiteController::class)->group(function () {
    Route::get('', 'index')->name('accueil');
    Route::get('boutique', 'shop')->name('boutique');
    Route::get('detail', 'show')->name('detail');
    Route::get('q', 'search')->name('search');
});

//panier
Route::controller(PanierController::class)->group(function () {
    // Route::get('/', [PanierController::class, 'index']);  
    Route::get('cart', [PanierController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [PanierController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [PanierController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [PanierController::class, 'remove'])->name('remove.from.cart');
});



//commande
Route::middleware(['client'])->group(function () {
    Route::controller(CommandeController::class)->group(function () {
        //liste des commande admin
        Route::get('commande', 'index')->name('liste-commande');
        //liste des commandes user
        Route::get('mes-commandes', 'mes_commandes')->name('commande-user');
        //facture user
        Route::get('ma-facture/{id}', 'facture_user')->name('facture-user');
        Route::get('annuler-ma-facture/{id}', 'annuler_facture')->name('annuler-facture');

        Route::post('change-status/{id}', 'change_status')->name('change-status');

        Route::get('finaliser-ma-commande', 'checkout')->name('caisse');
        Route::get('valider-ma-commande', 'finaliser_commande')->name('commande.store');
        //recuperer le tarif pour additionner au montant total
        Route::get('refresh_shipping/{id}', 'refresh_shipping');

        Route::get('bon-de-livraison/{id}', 'bon_livraison')->name('bon-livraison');
        Route::get('bon-de-livraison-pdf/{id}', 'print_bon_livraison')->name('print-bon-livraison');

    });
});


//AuthUser

Route::controller(AuthController::class)->group(function () {
    Route::get('creer-un-compte', 'register_form')->name('register_form');
    Route::post('creer-un-compte', 'register')->name('register-user');
    Route::get('se-connecter', 'login_form')->name('login_form');
    Route::post('se-connecter', 'login')->name('login-user');
    Route::post('deconnexion', 'logout')->name('logout-user')->middleware(['client']);
    Route::get('mon-profil', 'profil_user')->name('profil-user')->middleware('client');
    Route::post('modifier-mon-profil', 'profil_update')->name('profil-update')->middleware('client');
    Route::post('modifier-mon-de-passe', 'new_password_user')->name('profil-user-password')->middleware('client');
});
