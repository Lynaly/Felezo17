<?php

Route::get('/', 'NewsController@index')->name('news.index');

Route::group(['prefix' => 'news', 'as' => 'news.'], function ()
{

});

Route::get('programs', 'ProgramsController@index')->name('programs.index');

Route::get('location', 'LocationController@index')->name('location.index');

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function ()
{
    Route::get('/', 'OrdersController@index')->name('index');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function ()
{
    Route::get('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('{provider}/redirect', 'AuthController@redirect')->name('redirect');
    Route::get('{provider}/callback', 'AuthController@callback')->name('callback');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin']], function ()
{
    Route::get('/', 'IndexController@index')->name('index');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function()
    {
        Route::get('/', 'UsersController@index')->name('index');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function()
    {
        Route::get('/', 'OrdersController@index')->name('index');
    });
});