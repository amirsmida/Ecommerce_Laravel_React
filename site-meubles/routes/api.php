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
    Route::get('tout_categorie',[ApiController::class,'listeCategories']);
    Route::get('tout_article',[ApiController::class,'listeArticles']);
    Route::get('article_par_categorie/{id}',[ApiController::class,'articleByCatg']);
    Route::post('inscrit_client',[ApiController::class,'inscritClit']);
    Route::post('passer_commende',[ApiController::class,'passerCommende']);
    Route::post('lignie_commende',[ApiController::class,'lignieCommende']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
    ], function ($router) {
    Route::post('/login', [ApiController::class, 'login']);
});


Route::get('/scat/{idcat}', [SousCategorieController  ::class,'showSCategorieByCAT']);
Route::get('/listproduit/{idscat}', [ProduitController::class,'showArticlesBySCAT']);
Route::get('/produit/art/paginate', [ProduitController::class,'produitPaginate']);