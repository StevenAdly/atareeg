<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login user
Route::get('/loginUser', 'Api\LoginController@loginUser');

//register user
Route::get('/registerUser', 'Api\LoginController@registerUser');

//bookingHistory
Route::get('/bookingHistory', 'Api\BookingController@bookingHistory');

//firstStepBooking
Route::get('/firstStepBooking', 'Api\BookingController@firstStepBooking');

//secondStepBooking
Route::get('/secondStepBooking', 'Api\BookingController@secondStepBooking');

//thirdStepBooking
Route::get('/thirdStepBooking', 'Api\BookingController@thirdStepBooking');
