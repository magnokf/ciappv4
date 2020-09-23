<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Person;
use Symfony\Component\Console\Input\Input;

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth']], function (){


        Route::get('/users', 'UserController@index')->name('users.index');
        Route::get('/users/team', 'UserController@team')->name('users.team');
        Route::resource('users', 'UserController');

        //Person//

        Route::any('/people/search','PersonController@search');
        Route::resource('people', 'PersonController');

        //Craf Applications

        Route::any('applications/search','ApplicationController@search');
        Route::resource('applications', 'ApplicationController');

    });

});
