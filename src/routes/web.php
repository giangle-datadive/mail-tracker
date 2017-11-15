<?php

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

    Route::get('/mail-tracker/open', 'MailTracker\Controllers\MailTrackerController@open')->name('mail_tracker.open');
    Route::get('/mail-tracker/click', 'MailTracker\Controllers\MailTrackerController@click')->name('mail_tracker.click');