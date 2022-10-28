<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('/welcome');
});
Route::resource('/cars', CarController::class)->middleware(['auth']);

Route::get('/Cars.index', function () {
    return view('Cars.index');
})->middleware(['auth', 'verified'])->name('Cars');

Route::get('/Cars.ads', [CarController::class, 'myads'])->name('ads');


require __DIR__.'/auth.php';
