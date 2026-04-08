<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Url;
Route::get('/', function () {
    return view('welcome');
});
