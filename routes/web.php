<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SupportingMemberController;
use App\Http\Controllers\DonationController;

Route::get('/register', function () { return view('welcome'); }); 
Route::get('/', function () { return view('welcome'); });

//Booking Controller
Route::get('/prenotazione', [BookingController::class, 'create'])->name('booking.create');
Route::post('/prenotazione/store', [BookingController::class, 'store'])->name('bookings.store');

//Supporting Member Controller
Route::get('/membri', [SupportingMemberController::class, 'create'])->name('donations.create');
Route::post('/membri/store', [SupportingMemberController::class, 'store'])->name('members.store');

//Donation Controller
Route::get('/donazioni', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donazioni', [DonationController::class, 'store'])->name('donations.store');

//Thanks
Route::get('/thanks', function () { return view('thanks');})->name('thanks');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/trasporto', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/trasporto/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::put('/trasporto/{id}/update', [BookingController::class, 'update'])->name('bookings.update');
    Route::get('/trasporto/{id}/download', [BookingController::class, 'download'])->name('bookings.download');
    Route::get('/trasporto/{id}/mdownload', [BookingController::class, 'download_minori'])->name('bookings.mdownload');
    Route::get('/trasporto/{id}/delete', [BookingController::class, 'destroy'])->name('bookings.delete');
    Route::get('/bookings/download-all', [BookingController::class, 'downloadAll'])->name('bookings.downloadAll');
    Route::get('/bookings/export-csv', [BookingController::class, 'exportCsv'])->name('bookings.export_csv');

    Route::get('/supporting-members', [SupportingMemberController::class, 'index'])->name('members.index');
    Route::get('/supporting-members/{id}', [SupportingMemberController::class, 'show'])->name('members.show');
    Route::put('/supporting-members/{id}/update', [SupportingMemberController::class, 'update'])->name('members.update');
    Route::get('/supporting-members/{id}/delete', [SupportingMemberController::class, 'destroy'])->name('members.delete');

    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/{id}', [DonationController::class, 'show'])->name('donations.show');
    Route::put('/donations/{id}/update', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donations.destroy');

    Route::get('/supporting-members/{id}/download', [BookingController::class, 'download'])->name('members.download');
    Route::get('/supporting-members/export-csv', [SupportingMemberController::class, 'exportCsv'])->name('members.export_csv');

});


