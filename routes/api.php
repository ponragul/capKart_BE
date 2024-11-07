<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartListController;




// Define the route for getting all cart items
Route::get('/cart-list', [CartListController::class, 'index']);

// Define the route for getting all cart items by user_id
Route::get('/cart-list/{user_id}', [CartListController::class, 'showByUserId']);

// Define the route for creating a new cart item
Route::post('/cart-list', [CartListController::class, 'store']);

// Define the route for updating an existing cart item by ID
Route::put('/cart-list/{id}', [CartListController::class, 'update']);

// Define the route for deleting a cart item by ID
Route::delete('/cart-list/{id}', [CartListController::class, 'destroy']);