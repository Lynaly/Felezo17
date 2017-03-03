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
    Route::get('order', 'OrdersController@order')->name('order')->middleware('auth');
    Route::post('order', 'OrdersController@placeAnOrder')->name('placeAnOrder')->middleware('auth');
    Route::get('destroy/{order}', 'OrdersController@destroy')->name('destroy');
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

        Route::group(['prefix' => 'promote', 'as' => 'promote.'], function()
        {
            Route::get('participant/{user}', 'UsersController@promoteToParticipant')->name('participant');
        });

        Route::group(['prefix' => 'demote', 'as' => 'demote.'], function()
        {
            Route::get('participant/{user}', 'UsersController@demoteParticipant')->name('participant');
        });

        Route::get('{user}', 'UsersController@show')->name('show');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function()
    {
        Route::get('/', 'OrdersController@index')->name('index');
        Route::get('edit/{order}', 'OrdersController@edit')->name('edit');
        Route::post('update/{order}', 'OrdersController@update')->name('update');
        Route::get('destroy/{order}', 'OrdersController@destroy')->name('destroy');
        Route::get('export/csv', 'OrdersController@exportCsv')->name('export.csv');
    });

    Route::group(['prefix' => 'tickets', 'as' => 'tickets.'], function()
    {
        Route::get('/', 'TicketsController@index')->name('index');
        Route::get('create', 'TicketsController@create')->name('create');
        Route::post('store', 'TicketsController@store')->name('store');
        Route::get('edit/{ticket}', 'TicketsController@edit')->name('edit');
        Route::post('update/{ticket}', 'TicketsController@update')->name('update');
        Route::get('destroy/{ticket}', 'TicketsController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function()
    {
        Route::get('/', 'NewsController@index')->name('index');
        Route::get('create', 'NewsController@create')->name('create');
        Route::post('store', 'NewsController@store')->name('store');
        Route::get('edit/{news}', 'NewsController@edit')->name('edit');
        Route::post('update/{news}', 'NewsController@update')->name('update');
        Route::get('destroy/{news}', 'NewsController@destroy')->name('destroy');
    });
});