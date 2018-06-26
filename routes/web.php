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

Route::get('/', function () {
    return view('welcome');
});

//=============================================================================
//================== Admmin Panel routes ======================================
//=============================================================================

Route::get('/cp','AdminController@indexcp');

Route::get('/cp','AdminController@content');

//register & login pages
Route::get('/register', 'AdminController@registerPage');
Route::get('/login', 'AdminController@loginPage');

//register & login functions
Route::post('/register', 'AdminController@register');
Route::post('/login', 'AdminController@login');

//for redirect to forget_password page
Route::get('/forget_password', 'AdminController@forget_password');

//for redirect to new_password page
Route::get('/newPassword', 'AdminController@newPassword');

//login with new password
Route::post('/login_newPassword', 'AdminController@login_newPassword');

//logout
Route::get('/logout', 'AdminController@logout');
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

//go to all_users page
Route::get('/all/users',"UserController@all_users");

//go to add user page
Route::get('/add/user',"UserController@add_user");

//go to add_new_user
Route::post('/add/new/user',"UserController@insert_user");

//go to edit_user page
Route::get('/edit/user/{id}',"UserController@edit_user");

//go to update_user
Route::post('/update/user/{id}',"UserController@update_user");

//go to delete_user
Route::get('/delete/user/{id}',"UserController@delete_user");
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//go to all_bookings page
Route::get('/all/bookings',"BookingController@all_bookings");

//go to add booking page
Route::get('/add/booking',"BookingController@add_booking");

//go to add_new_booking
Route::post('/add/new/booking',"BookingController@insert_booking");

//go to edit_booking page
Route::get('/edit/booking/{b_id}',"BookingController@edit_booking");

//go to update_booking
Route::post('/update/booking/{b_id}',"BookingController@update_booking");

//go to delete_booking
Route::get('/delete/booking/{b_id}',"BookingController@delete_booking");

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//go to all_rattings page
Route::get('/all/ratings',"RatingController@all_ratings");

//go to add ratting page
Route::get('/add/rating',"RatingController@add_rating");

//go to add_new_ratting
Route::post('/add/new/rating',"RatingController@insert_rating");

//go to edit_ratting page
Route::get('/edit/rating/{r_id}',"RatingController@edit_rating");

//go to update_ratting
Route::post('/update/rating/{r_id}',"RatingController@update_rating");

//go to delete_ratting
Route::get('/delete/rating/{r_id}',"RatingController@delete_rating");

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//go to all_comments page
Route::get('/all/comments',"CommentController@all_comments");

//go to add comment page
Route::get('/add/comment',"CommentController@add_comment");

//go to add_new_comment
Route::post('/add/new/comment',"CommentController@insert_comment");

//go to edit_comment page
Route::get('/edit/comment/{com_id}',"CommentController@edit_comment");

//go to update_comment
Route::post('/update/comment/{com_id}',"CommentController@update_comment");

//go to delete_comment
Route::get('/delete/comment/{com_id}',"CommentController@delete_comment");

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//go to all_time_blocks page
Route::get('/all/blocks',"BlockController@all_blocks");

//go to add block time page
Route::get('/add/block',"BlockController@add_block");

//go to add_new_block_time
Route::post('/add/new/block',"BlockController@insert_block");

//go to edit_block_time page
Route::get('/edit/block/{bl_id}',"BlockController@edit_block");

//go to update_block_time
Route::post('/update/block/{bl_id}',"BlockController@update_block");

//go to delete_block_time
Route::get('/delete/block/{bl_id}',"BlockController@delete_block");
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

//go to all_constaints page
Route::get('/all/constraints',"ConstaintController@all_constraints");

//go to add constaint page
Route::get('/add/constraint',"ConstaintController@add_constraint");

//go to add_new_constaint
Route::post('/add/new/constraint',"ConstaintController@insert_constraint");

//go to edit_constaint page
Route::get('/edit/constraint/{c_id}',"ConstaintController@edit_constraint");

//go to update_constaint_time
Route::post('/update/constraint/{c_id}',"ConstaintController@update_constraint");

//go to delete_constaint_time
Route::get('/delete/constraint/{c_id}',"ConstaintController@delete_constraint");

//=============================================================================
//==================== Web site routes ========================================
//=============================================================================

/// go to index page
Route::get('/', 'WebsiteController@index');

/// go to index page
Route::get('/booking', 'WebsiteController@booking');

//register user
Route::post('/register/client', 'WebsiteController@reg');

//register user
Route::post('/login/client', 'WebsiteController@log');

//logout
Route::get('/logout/user', 'WebsiteController@logout_user');

//booking first step
Route::get('/booking/step1', 'WebsiteController@firstStepBooking');

//booking second step
Route::get('/booking/step2', 'WebsiteController@secondStepBooking');

//booking third step
Route::get('/booking/step3', 'WebsiteController@thirdStepBooking');


//go to new_Booking page
Route::get('/new/booking', 'WebsiteController@new_Booking');