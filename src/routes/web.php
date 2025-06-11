<?php

use Illuminate\Support\Facades\Route;
use SoftAndTech\Contactus\Http\Controllers\ContactUsController;
use SoftAndTech\Contactus\Http\Controllers\ContactUsSettingsController;

// Public-facing contact form
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');
Route::post('/contactus', [ContactUsController::class, 'send'])->name('contactus.send');

// Admin settings (consider middleware for auth)
Route::middleware(['web'])->group(function () {
    Route::get('/contactus/settings', [ContactUsSettingsController::class, 'index'])->name('contactus.settings');
    Route::post('/contactus/settings/update', [ContactUsSettingsController::class, 'update'])->name('contactus.settings.update');
});
