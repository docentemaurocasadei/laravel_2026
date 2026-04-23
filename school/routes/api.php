<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//User::create(['email' => 'admin@example.com', 'name'=> 'admin', 'password' => Hash::make('password123')]);  

Route::post('/students/search', [\App\Http\Controllers\StudentController::class, 'search'])->name('students.search');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/courses/{course}/students', [\App\Http\Controllers\CourseController::class, 'addStudents'])->name('courses.enroll');
    Route::delete('/courses/{course}/students/{student}', [\App\Http\Controllers\CourseController::class, 'removeStudent'])->name('courses.removeStudent');
    Route::apiResource('students', \App\Http\Controllers\StudentController::class)
    ->only(['store', 'update', 'destroy']);
    Route::apiResource('courses', \App\Http\Controllers\CourseController::class)
    ->only(['store', 'update', 'destroy']);
});
Route::apiResource('students', \App\Http\Controllers\StudentController::class)
->only(['index', 'show']);
Route::apiResource('courses', \App\Http\Controllers\CourseController::class)
->only(['index', 'show']);

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if (auth()->attempt($credentials)) {
        $user = auth()->user();
        return response()->json([
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
    return response()->json(['message' => 'Invalid credentials'], 401);
})->name('login');

