<?php

use App\Http\Controllers\api\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// API
Route::get('/comments', [API::class, 'index']); // Get All

Route::get('/comments/{id}', [API::class, 'show']); // Get a single comment by ID

Route::post('/comments/create', [API::class, 'store']); // Create a new comment

Route::put('/comments/update/{id}', [API::class, 'update']); // Update a comment by ID

Route::delete('/comment/delete/{id}', [API::class, 'destroy']); // Delete a comment by ID