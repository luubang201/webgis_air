<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ClientController;

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
Route::get('/login', 'ClientController@login')->name('login');
Route::post('/login', 'ClientController@postLogin')->name('postLogin');
Route::get('/logout', 'ClientController@logout')->name('logout');


Route::prefix('trangchu')->name('trangchu.')->group(function(){
    // ReadAllPoint

    Route::get('/', [PointController::class, 'readPoint'])->name('index');
    Route::get('/login', [ClientController::class, 'index'])->name('login');

    Route::get('/indexclient', [PointController::class, 'readPointClient'])->name('indexclient');

    // Form AddPoint
    Route::get('/add', [PointController::class, 'formAdd'])->name('form-add');

    // Form map
    Route::get('/map', [PointController::class, 'formMap'])->name('form-map');

    Route::get('/mapclient', [PointController::class, 'formMapclient'])->name('form-map-client');

    // AddPoint
    Route::post('/add', [PointController::class, 'addPoint'])->name('add');

    // UpdatePoint
    Route::get('edit/{id}', [PointController::class,'formUpdate'])->name('form-update');

    // Xem chi tiết điểm
    Route::get('chi-tiet-diem-kt/{id}', [PointController::class,'chitiet'])->name('chitiet');

    // UpdatePoint
    Route::post('edit/{id}', [PointController::class,'updatePoint'])->name('update');

    // DeletePoint
    Route::get('/delete/{id}', [PointController::class,'detelePoint'])->name('delete');


     // Excel
     Route::get('/xuat-excel', [PointController::class,'exportUsers'])->name('xuatexcel');
});



