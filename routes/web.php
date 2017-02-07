<?php

Route::get('/', 'NewsController@index')->name('news.index');

Route::group(['prefix' => 'news', 'as' => 'news.'], function ()
{

});

Route::get('programs', 'ProgramsController@index')->name('programs.index');

Route::get('location', 'LocationController@index')->name('location.index');