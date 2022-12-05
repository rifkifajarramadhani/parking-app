<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParkingController;

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

Route::get('/', function () {
    return view('parking');
});

Route::get('/home', [ParkingController::class, 'index']);
Route::post('/vehicleIn', [ParkingController::class, 'vehicleIn']);
Route::post('/vehicleOut', [ParkingController::class, 'vehicleOut']);
