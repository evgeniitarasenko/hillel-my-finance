<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-account', function () {
    return \Illuminate\Support\Facades\Auth::user();
})->middleware('auth');

Route::put('/my-account', function () {
    $path = request()->file('avatar')->store('avatars');
    $user = \Illuminate\Support\Facades\Auth::user();

    $user->avatar = $path;
    $user->name = request()->input('name');
    $user->save();

    return $user;
})->middleware('auth');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');
Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth');
Route::put('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth');
Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth');

Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index'])->middleware('auth');
Route::post('/transactions', [\App\Http\Controllers\TransactionController::class, 'store'])->middleware('auth');
Route::put('/transactions/{transaction}', [\App\Http\Controllers\TransactionController::class, 'update'])->middleware('auth');
Route::delete('/transactions/{transaction}', [\App\Http\Controllers\TransactionController::class, 'destroy'])->middleware('auth');
