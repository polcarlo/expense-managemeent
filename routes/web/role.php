<?php

$prefix = config('web.role.prefix');

Route::group(['prefix' => $prefix], function () use ($prefix) {
    Route::get('/', 'RoleController@index')->name($prefix.'.index');

    // DATATABLES
    Route::get('dt-list', 'RoleController@dtList')->name($prefix.'.dt');

    // VIEW
    Route::get('view/{id}', 'RoleController@show')->name($prefix.'.view');

    // CREATE
    Route::get('create', 'RoleController@create')->name($prefix.'.create');
    Route::post('create', 'RoleController@store')->name($prefix.'.store');

    // UPDATE
    Route::get('edit/{id}', 'RoleController@edit')->name($prefix.'.edit');
    Route::post('edit/{id}', 'RoleController@update')->name($prefix.'.update');

    // DELETE
    Route::post('delete/{id}', 'RoleController@destroy')->name($prefix.'.destroy');
});
