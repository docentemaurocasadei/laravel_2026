<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', function (Request $request) {
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
    ]);
    // i parametri sono corretti, creo il token
    if (auth()->attempt($validated)) {
        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
    return response()->json(['message' => 'Invalid credentials'], 401);

})->name('login');
// Rotte protette da auth:sanctum
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', function () {
        $user = auth()->user();
        return response()->json([
            'message' => 'Utente autenticato',
            'user' => $user,
        ]);
    });
});