<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivraisonController;
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
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('login', [UserController::class, 'loginForm'])->name('login-form');


//Route admin
Route::middleware('auth')->prefix('admin')->group(function () {

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
        route::post('logout', 'logout')->name('logout');
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
    });



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

    /**Produit */
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
});





 /**Site */
 Route::controller(SiteController::class)->group(function () {
    Route::get('', 'index')->name('accueil');
  
});




