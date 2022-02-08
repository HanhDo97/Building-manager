<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContractController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('contracts', ContractController::class);
    Route::resource('users', UserController::class);
});

/*
Route::resource('users','UserController');
Route::resource('contracts','ContractController');
Route::resource('students','StudentController');
Route::resource('profiles','ProfileController');

Route::resource('rooms','RoomController');
Route::prefix('room')->group(function (){
    Route::post('{serviceId}','RoomController@addService')->name('addService');
    Route::delete('{serviceId}','RoomController@detachService')->name('detachService');
});
Route::resource('services','ServiceController');
Route::resource('electrics','ElectricController');
Route::resource('vehicles','VehicleController');
Route::resource('histories','HistoryController');
Route::resource('equipments','EquipmentController');
Route::resource('waters','WaterController');
*/
