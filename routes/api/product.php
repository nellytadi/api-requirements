<?php

use App\Domains\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/fetch', [ProductController::class, 'fetch']);
