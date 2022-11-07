<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

/*The web.php file specifies each route that are to be used for the website's interface */

/*This route is specified in order to return the home screen  */
Route::get('/', function () {
    return view('/welcome');
});


/*This route is specified in order to return the main screen if a user is logged in */
Route::resource('/cars', CarController::class)->middleware(['auth']);



Route::get('/Cars.index', function () {
    return view('Cars.index');
})->middleware(['auth', 'verified'])->name('Cars');



require __DIR__.'/auth.php';