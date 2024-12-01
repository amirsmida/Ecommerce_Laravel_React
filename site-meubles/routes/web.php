<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashbord\CategoriesController;
use App\Http\Controllers\dashbord\ProduitsController;

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
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
