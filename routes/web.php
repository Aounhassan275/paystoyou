<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

/******************ADMIN PANELS ROUTES****************/
Route::group(['prefix' => 'admin', 'as'=>'admin.','namespace' => 'Admin'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'admin.auth.index')->name('login');
    Route::post('login','AuthController@login');
     /******************MESSAGE ROUTES****************/
     Route::resource('message', 'MessageController');
    Route::group(['middleware' => 'auth:admin'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::view('dashboard', 'admin.dashboard.index')->name('dashboard.index');
    /******************ADMIN ROUTES****************/
      Route::resource('admin', 'AdminController');    
    /*******************Profile ROUTES*************/
    Route::view('profile', 'admin.profile.index')->name('profile.index');
    /******************PACKAGE ROUTES****************/
    Route::resource('package', 'PackageController');    
    /******************TICKER ROUTES****************/
    Route::resource('ticker', 'TickerController');   
    /******************Payment Way ROUTES****************/
    Route::resource('payment', 'PaymentController');   
    /******************Ad ROUTES****************/
    Route::resource('ad', 'AdController'); 
    /******************Review ROUTES****************/
    Route::resource('review', 'ReviewController'); 
    /******************Video ROUTES****************/
    Route::resource('video', 'VideoController'); 
    /******************User ROUTES****************/
    Route::view('user', 'admin.user.index')->name('user.index');  
    Route::view('user/actives', 'admin.user.active')->name('user.actives');  
    Route::view('user/pendings', 'admin.user.pending')->name('user.pendings');  

    Route::get('admin/user/detail/{id}','UserController@showDetail')->name('user.detail');
    Route::get('admin/user/activation/{id}','UserController@activation')->name('user.activation');
    Route::get('admin/user/delete/{id}','UserController@delete')->name('user.delete');
    Route::get('admin/user/block/{id}','UserController@block')->name('user.block');
    Route::post('admin/user/update','UserController@update')->name('user.update');
    /******************Deposit ROUTES****************/
    Route::view('deposit', 'admin.deposit.index')->name('deposit.index');
    Route::view('deposit/show', 'admin.deposit.show')->name('deposit.show');
    Route::get('user/active/{id}', 'DepositController@active')->name('user.active');   
    Route::get('deposit/delete/{id}', 'DepositController@delete')->name('deposit.delete');   
       /******************Withdraw ROUTES****************/
       Route::view('withdraw', 'admin.withdraw.index')->name('withdraw.index');
	Route::view('withdraw/on_hold', 'admin.withdraw.hold')->name('withdraw.holds');
       Route::view('withdraw/history', 'admin.withdraw.complete')->name('withdraw.complete');

       Route::get('withdraw/hold/{id}', 'WithdrawController@hold')->name('withdraw.hold');   
       Route::get('withdraw/completed/{id}', 'WithdrawController@completed')->name('withdraw.completed');   
       Route::get('withdraw/delete/{id}', 'WithdrawController@delete')->name('withdraw.delete');   
	/******************Donation ROUTES****************/
       Route::view('donation', 'admin.donation.index')->name('donation.index');
});
});
/******************USER PANELS ROUTES****************/
Route::group(['prefix' => 'user', 'as'=>'user.','namespace' => 'User'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'user.auth.login')->name('login');
    Route::post('login','AuthController@login');
     /******************REGISTERED ROUTES****************/
    Route::view('register', 'user.auth.register')->name('register');
    Route::view('verification', 'user.auth.forget')->name('verification');
    Route::view('reset', 'user.auth.reset')->name('reset');
    Route::post('register','AuthController@register')->name('register');
    Route::post('verification','AuthController@sendVerification')->name('verification');
    Route::post('resetPassword','AuthController@resetPassword')->name('resetPassword');
    Route::get('register/{code}', 'AuthController@code');
    Route::group(['middleware' => 'auth:user'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::view('dashboard', 'user.dashboard.index')->name('dashboard.index');
    /******************PACKAGE ROUTES****************/
    Route::view('package', 'user.package.index')->name('package.index');
    Route::get('select_payment/{id}', 'PackageController@payment')->name('package.payment');
    Route::get('{payment}/deposit/{package}', 'DepositController@deposit')->name('deposits.index');    
    /******************REFRRAK ROUTES****************/
    Route::get('refer', 'UserController@refer')->name('refer.index');
    /******************Deposit  ROUTES****************/
       Route::resource('deposit', 'DepositController');
       /******************Withdraw  ROUTES****************/
       Route::resource('withdraw', 'WithdrawController');  
       /******************USER PROFILE  ROUTES****************/
       Route::resource('user', 'UserController');  
       /******************DONATION  ROUTES****************/
       Route::resource('donation', 'DonationController');  
       /******************Ad  ROUTES****************/
       Route::get('user/show/ad', 'AdController@show')->name('ad.index');
       Route::post('user/ad/verify/{id}', 'AdController@ad_verify')->name('ad.store');
       Route::view('daily', 'user.ad.daily')->name('ad.daily');
       Route::view('referral', 'user.ad.referral')->name('ad.referral');
        /*******************Video ROUTES*************/
    Route::view('video', 'user.video.index')->name('video.index');
    /*******************Balance Transfer ROUTES*************/
    Route::get('balance_transfer', 'TranscationController@balance_transfer')->name('balance_transfer.index');
    /******************TRANSCATIONS  ROUTES****************/
    Route::resource('transcation', 'TranscationController'); 
});


    
});

// Route::post('user/deposit', 'User\DepositController@store')->name('user.deposit.store');
/******************FRONTEND ROUTES****************/
Route::view('/', 'front.home.index');
Route::view('contact_us', 'front.contact.index'); 
Route::view('packages', 'front.package.index'); 
Route::view('about_us', 'front.about.index'); 
Route::view('videos', 'front.video.index'); 
Route::view('terms_&_condition', 'front.term.index'); 
/******************FUNCTIONALITY ROUTES****************/
Route::get('/cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
});

