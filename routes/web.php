<?php

use App\Http\Controllers\Admin\BikesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\RentsController;
use App\Http\Controllers\Admin\VariantsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');






Route::resource('/bikes',BikesController::class);


Route::resource('/rents',RentsController::class);
Route::post('/getVariant',[RentsController::class,'getVariant']);


Route::get('/brands',[BrandsController::class,'index'])->name('brands.index');
Route::get('/brands/create',[BrandsController::class,'create'])->name('brands.create');
Route::post('/brands',[BrandsController::class,'store'])->name('brands.store');
Route::get('/brands/{id}/edit',[BrandsController::class,'edit'])->name('brands.edit');
Route::post('/brands/{id}/update',[BrandsController::class,'update'])->name('brands.update');

Route::get('/variants',[VariantsController::class,'index'])->name('variants.index');
Route::get('/variants/create',[VariantsController::class,'create'])->name('variants.create');
Route::post('/variants',[VariantsController::class,'store'])->name('variants.store');
Route::get('/variants/{id}/edit',[VariantsController::class,'edit'])->name('variants.edit');
Route::post('/variants/{id}/update',[VariantsController::class,'update'])->name('variants.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
