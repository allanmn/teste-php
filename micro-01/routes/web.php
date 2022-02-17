<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TagsController;

Route::get('/', function () {
    return view('index.index');
});


Route::get('relatorio', [ReportController::class, 'export']);

Route::prefix('tags')->controller(TagsController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::get('{id}/edit', 'show');
    
    Route::post('store', 'store');
    Route::put('{id}/update', 'update');
    Route::delete('{id}/delete', 'destroy');
});

Route::prefix('produtos')->controller(ProductsController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::get('{id}/edit', 'show');
    
    Route::post('store', 'store');
    Route::put('{id}/update', 'update');
    Route::delete('{id}/delete', 'destroy');
});

