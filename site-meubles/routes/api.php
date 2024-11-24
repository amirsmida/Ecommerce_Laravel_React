<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SousCategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::apiResource('categories', CategorieController::class);
    Route::resource('sousCategorie', SousCategorieController::class);
    Route::resource('produit', ProduitController::class);

});
Route::get('/scat/{idcat}', [SousCategorieController  ::class,'showSCategorieByCAT']);
Route::get('/listproduit/{idscat}', [ProduitController::class,'showArticlesBySCAT']);
Route::get('/produit/art/paginate', [ProduitController::class,'produitPaginate']);

