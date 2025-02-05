<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\DeliveryController;

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

Route::get('/dashboard', [DeliveryController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //customer
    Route::resource('customers', CustomerController::class)->middleware(['admin']);

    //driver
    Route::resource('drivers', DriverController::class)->middleware(['admin']);
    Route::post('/assign', [DriverController::class , 'assign'])->name('assign')->middleware(['admin']);


    //package
    Route::resource('packages', PackagesController::class)->middleware(['admin']);

    //delivery
    Route::get('/delivery', [DeliveryController::class, 'index']);
    // Route::post('/delivery/assign', [DeliveryController::class, 'store'])->name('delivery.store');

});

require __DIR__.'/auth.php';
