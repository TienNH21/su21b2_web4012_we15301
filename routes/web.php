<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function () {
    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('create', 'UserController@create')->name('create');
        Route::post('store', 'UserController@store')->name('store');
        Route::get('edit/{user}', 'UserController@edit')->name('edit');
        Route::post('update/{user}', 'UserController@update')->name('update');
        Route::post('delete/{user}', 'UserController@delete')->name('delete');
        Route::get('/{user}', 'UserController@show')->name('show');
    });

    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {
        // Route ...
    });

    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function () {
        // Route ...
    });
});
