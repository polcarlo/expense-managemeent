<?php

$prefix = config('web.user.prefix');

Route::group(['prefix' => $prefix], function () use ($prefix) {
    Route::get('/', 'UserController@index')->name($prefix.'.index');

    // DATATABLES
    Route::get('dt-list', 'UserController@dtList')->name($prefix.'.dt');

    // VIEW
    Route::get('view/{id}', 'UserController@show')->name($prefix.'.view');

    // CREATE
    Route::get('create', 'UserController@create')->name($prefix.'.create');
    Route::post('create', 'UserController@store')->name($prefix.'.store');

    // UPDATE
    Route::get('edit/{id}', 'UserController@edit')->name($prefix.'.edit');
    Route::post('edit/{id}', 'UserController@update')->name($prefix.'.update');

    // DELETE
    Route::post('delete/{id}', 'UserController@destroy')->name($prefix.'.destroy');
});
