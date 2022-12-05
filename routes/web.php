<?php

use App\Http\Controllers\admin\CarController as AdminCarController;
use App\Http\Controllers\user\CarController as UserCarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*The web.php file specifies each route that are to be used for the website's interface */

/*This route is specified in order to return the home screen  */

Route::get('/', function () {
    return view('/welcome');
});


/*This route is specified in order to return the main screen if a user is logged in */
// Route::resource('/cars', CarController::class)->middleware(['auth']);



// Route::get('/Cars.index', function () {
//     return view('Cars.index');
// })->middleware(['auth', 'verified'])->name('Cars');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::resource('/admin/cars', AdminCarController::class)->middleware(['auth'])->names('admin.cars');

Route::resource('/user/cars', UserCarController::class)->middleware(['auth'])->names('user.cars');


require __DIR__ . '/auth.php';
