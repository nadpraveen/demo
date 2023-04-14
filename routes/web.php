<?php

use App\Http\Controllers\UserDetailsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::post('/', function (Request $request) {
//     dd($request);
// });

Route::get('/', [UserDetailsController::class, 'index']);

Route::get('/create', [UserDetailsController::class, 'create']);

Route::post('/store', [UserDetailsController::class, 'store']);

Route::get('/edit/{id}', [UserDetailsController::class, 'edit']);

Route::post('/update', [UserDetailsController::class, 'update']);

Route::get('/delete/{id}', [UserDetailsController::class, 'delete']);

Route::post('/search', [UserDetailsController::class, 'search']);