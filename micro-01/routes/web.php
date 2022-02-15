<?php

use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
});

Route::get('tags', [TagsController::class, 'index']);
Route::get('tags/create', [TagsController::class, 'create']);
Route::post('tags/store', [TagsController::class, 'store']);
