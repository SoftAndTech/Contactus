<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
 
Route::group(['namespace'=>'SoftAndTech\Contactus\Http\Controllers'], function () {
    Route::get('contactus', 'ContactUsController@index')->name('contactus');
    Route::post('contactus', 'ContactUsController@send');
});
