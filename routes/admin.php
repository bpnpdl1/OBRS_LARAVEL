<?php

use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\BikesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\RentsController;
use App\Http\Controllers\Admin\VariantsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::view('/login','admin.login')->name('admin.login');



Route::middleware(['isadmin'])->group(function () {

 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



    Route::get('/bikes', [BikesController::class, 'index'])->name('bikes.index');
    Route::get('/bikes/create', [BikesController::class, 'create'])->name('bikes.create');
    Route::post('/bikes', [BikesController::class, 'store'])->name('bikes.store');
    Route::get('/bikes/{id}/edit', [BikesController::class, 'edit'])->name('bikes.edit');
    Route::post('/bikes/{id}/update', [BikesController::class, 'update'])->name('bikes.update');
    Route::post('/bikes/destroy', [BikesController::class, 'destroy'])->name('bikes.destroy');


    Route::get('/variants', [VariantsController::class, 'index'])->name('variants.index');
    Route::get('/variants/create', [VariantsController::class, 'create'])->name('variants.create');
    Route::post('/variants', [VariantsController::class, 'store'])->name('variants.store');
    Route::get('/variants/{id}/edit', [VariantsController::class, 'edit'])->name('variants.edit');
    Route::post('/variants/{id}/update', [VariantsController::class, 'update'])->name('variants.update');


    Route::resource('/rents', RentsController::class);
    Route::post('/getVariant', [RentsController::class, 'getVariant']);
    Route::post('/getBike', [RentsController::class, 'getBike']);
    Route::post('/getRentalDates', [RentsController::class, 'getRentalDates']);

    Route::get('/brands', [BrandsController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandsController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandsController::class, 'store'])->name('brands.store');
    Route::get('/brands/{id}/edit', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::post('/brands/{id}/update', [BrandsController::class, 'update'])->name('brands.update');
    Route::post('/brands/destroy', [BrandsController::class, 'destroy'])->name('brands.destroy');


    Route::resource('company', CompanyController::class);
    Route::resource('analytics', AnalyticsController::class);
    Route::post('/changemonth', [AnalyticsController::class, 'changemonth']);
});




?>