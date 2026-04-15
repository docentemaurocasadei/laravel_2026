<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Url;
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ifts2026', function () {
    Log::debug('Accesso alla rotta /ifts2026');
    Log::debug('URL completo (Facade) : ' . Url::full());
    Log::debug('URL completo (helpers): ' . url()->current());
//     return Response::json([
//         'message' => 'Corso IFTS 2026 - Sviluppo di applicazioni web con Laravel',
//     ]);
// });
    return response()->json([
        'message' => 'Corso IFTS 2026 - Sviluppo di applicazioni web con Laravel',
    ]);
});
Route::get('/info', function () {
    return response()->view('info');
});
Route::get('/pippo', function () {
    return Redirect::to('/api/product');
});