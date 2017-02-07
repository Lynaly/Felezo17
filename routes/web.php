<?php

Route::group(['domain' => env('APP_DOMAIN', 'felezo.sch.bme.hu')], function ()
{
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
});

Route::group(['domain' => env('APP_ADMIN_DOMAIN'), 'namespace' => 'Admin'], function ()
{
    Route::get('/', 'IndexController@index')->name('index');
});