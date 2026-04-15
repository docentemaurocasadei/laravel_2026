<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Request as FacadeRequest;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/info', function () {
    return response()->json([
        'message' => 'Corso IFTS 2026 - Sviluppo di applicazioni web con Laravel',
    ]);
});
Route::middleware('check.user')->group(function () {
    Route::get('/products', function (Request $request) {
        Log::debug('metodo:'.$request->method());
        // Log::debug(request()->getMethod());
        // Log::debug(FacadeRequest::method());
        return response()->json([
            'message' => 'Lista Prodotti',
        ]);
    });
    Route::post('/products', function () {
        return response()->json([
            'message' => 'Creazione Prodotto',
        ]);
    });
    Route::put('/products/{id}', function ($id) {
        return response()->json([
            'message' => "Aggiornamento Prodotto con ID: $id",
        ]);
    });
    Route::delete('/products/{id}', function ($id) {
        return response()->json([
            'message' => "Eliminazione Prodotto con ID: $id",
        ]);
    });
    //creare la rotta per lo show del prodotto con id dinamico
    Route::get('/products/{id}', function ($id) {
        return response()->json([
            'message' => "Dettagli Prodotto con ID: $id",
        ]);
    });
    Route::get('/products/search/{name?}', function (Request $request, ?string $name = null) {
        return Redirect::to(route('categories.search'));

        // return response()->json([
        //     'message' => "Ricerca Prodotto con nome: $name",
        // ]);
    });
    Route::get('/categories/search', function () {
        return response()->json([
            'message' => "Ricerca Categoria",
        ]);
    })->name('categories.search');
});
Route::middleware('verify.param')->prefix('admin')->group(function () {
    Route::get('/admin-users', function () {
        return response()->json([
            'message' => 'Admin Users Lista',
        ]);
    });
    Route::post('/admin-users', function () {
        return response()->json([
            'message' => 'Admin Users Creazione',
        ]);
    });
});