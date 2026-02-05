<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/register', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/booking', function () {
        return view('user/general-bookings');
    })->name('booking');

Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');

Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/trasporto', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/trasporto/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::put('/trasporto/{id}/update', [BookingController::class, 'update'])->name('bookings.update');
    Route::get('/trasporto/{id}/download', [BookingController::class, 'download'])->name('bookings.download');
    Route::get('/trasporto/{id}/mdownload', [BookingController::class, 'download_minori'])->name('bookings.mdownload');
    Route::get('/trasporto/{id}/delete', [BookingController::class, 'destroy'])->name('bookings.delete');
    Route::get('/bookings/download-all', [BookingController::class, 'downloadAll'])->name('bookings.downloadAll');
    Route::get('/bookings/export-csv', [BookingController::class, 'exportCsv'])->name('bookings.export_csv');

});


