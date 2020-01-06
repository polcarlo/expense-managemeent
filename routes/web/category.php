<?php

$prefix = config('web.category.prefix');

Route::group(['prefix' => $prefix], function () use ($prefix) {
    Route::get('/', 'CategoryController@index')->name($prefix.'.index');

    // DATATABLES
    Route::get('dt-list', 'CategoryController@dtList')->name($prefix.'.dt');

    // VIEW
    Route::get('view/{id}', 'CategoryController@show')->name($prefix.'.view');

    // CREATE
    Route::get('create', 'CategoryController@create')->name($prefix.'.create');
    Route::post('create', 'CategoryController@store')->name($prefix.'.store');

    // UPDATE
    Route::get('edit/{id}', 'CategoryController@edit')->name($prefix.'.edit');
    Route::post('edit/{id}', 'CategoryController@update')->name($prefix.'.update');

    // DELETE
    Route::post('delete/{id}', 'CategoryController@destroy')->name($prefix.'.destroy');
});
