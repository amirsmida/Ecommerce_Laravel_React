<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommendesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::get('modif_etat_categorie/{id}/{etat}', [CategoriesController::class, 'archive'])->name('modif_etat_categorie');
    Route::get('categories_archive', [CategoriesController::class, 'indexArchiv'])->name('categories_archive');

    Route::resource('articles', ProduitsController::class);
    Route::get('modif_etat_article/{id}/{etat}', [ProduitsController::class, 'archive'])->name('modif_etat_article');
    Route::get('articles_archive', [ProduitsController::class, 'indexArchiv'])->name('articles_archive');

    /* clients  */
   Route::get('client', [ClientsController::class, 'index'])->name('client.index');
   Route::get('modif_etat_client/{id}/{etat}', [ClientsController::class, 'archive'])->name('modif_etat_client');
   Route::get('clients_archive', [ClientsController::class, 'indexArchiv'])->name('clients_archive');

    /* commende  */
    Route::get('commende', [CommendesController::class, 'index'])->name('commende.index');
    Route::get('detaille_commende/{id}', [CommendesController::class, 'show'])->name('detaille_commende');
    Route::get('modif_etat_commende/{id}/{etat}', [CommendesController::class, 'updatEtat'])->name('modif_etat_commende');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
