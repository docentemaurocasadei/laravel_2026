<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request as FacadeRequest;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/info', function () {
    return response()->json([
        'message' => 'Corso IFTS 2026 - Sviluppo di applicazioni web con Laravel',
    ]);
});

Route::get('/product', function (Request $request) {
    Log::debug('metodo:'.$request->method());
    // Log::debug(request()->getMethod());
    // Log::debug(FacadeRequest::method());
    return response()->json([
        'message' => 'Lista Prodotti',
    ]);
});
Route::post('/product', function () {
    return response()->json([
        'message' => 'Creazione Prodotto',
    ]);
});
Route::put('/product/{id}', function ($id) {
    return response()->json([
        'message' => "Aggiornamento Prodotto con ID: $id",
    ]);
});
Route::delete('/product/{id}', function ($id) {
    return response()->json([
        'message' => "Eliminazione Prodotto con ID: $id",
    ]);
});
//creare la rotta per lo show del prodotto con id dinamico
Route::get('/product/{id}', function ($id) {
    return response()->json([
        'message' => "Dettagli Prodotto con ID: $id",
    ]);
});
