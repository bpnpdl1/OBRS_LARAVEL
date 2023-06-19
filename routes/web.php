<?php

use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\BikesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\RentsController;
use App\Http\Controllers\Admin\VariantsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Renter\RenterController;
use Illuminate\Http\Request;
use App\Mail\ObrsMail;
use App\Models\Brand;
use App\Models\Rent;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;
use App\Mail\TicketMail;
use App\Mail\WelcomeMail;
use App\Models\Bike;
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

    $brands = Brand::all();
    return view('home', compact('brands'));
})->name('home');

Route::get('/showmail', function () {


    return view('emails.rentalstatusmail');
});


Route::get('/noaccess', function () {




    return view('noaccess.noaccess');
})->name('no-access');



Route::middleware(['auth', 'isadmin', 'verified'])->group(function () {

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





Route::get('/showbikes', [RenterController::class, 'index'])->name('renter.showbikes');
Route::post('/bikedetails', [RenterController::class, 'bikedetails'])->name('renter.bikedetails');
Route::get('/rentdetails', [RenterController::class, 'rentdetails'])->name('renter.rent.details');
Route::post('/khaltirent', function (Request $request) {

    $rentbike = [
        "rent_from_date" => $request->from_date,
        "rent_to_date" => $request->to_date,
        "rental_status" => "Pending",
        "payment_method" => "Online",
        'total_rental_price' => $this->total_rental_price,
        "bike_id" => $request->bike->id,
        "user_id" => auth()->user()->id
    ];




    Rent::create($rentbike);
    $bike['status'] = "On Rent";
    Bike::find($this->bike->id)->update($bike);


    return response()->json($request->toArray());
})->name('khaltirent');



Route::get('/test', function () {


    $rent = Rent::find(5);
    $rent->id = 5;
    $rentalbike = Rent::find(5);



    // return view('frontend.partials.rentalticket',compact('rentalbike','rent'));
});

// Auth::routes(['verify' => true]);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
