<?php

$prefix = config('web.expense.prefix');

Route::group(['prefix' => $prefix], function () use ($prefix) {
    Route::get('/', 'ExpenseController@index')->name($prefix.'.index');

    // DATATABLES
    Route::get('dt-list', 'ExpenseController@dtList')->name($prefix.'.dt');

    // VIEW
    Route::get('view/{id}', 'ExpenseController@show')->name($prefix.'.view');

    // CREATE
    Route::get('create', 'ExpenseController@create')->name($prefix.'.create');
    Route::post('create', 'ExpenseController@store')->name($prefix.'.store');

    // UPDATE
    Route::get('edit/{id}', 'ExpenseController@edit')->name($prefix.'.edit');
    Route::post('edit/{id}', 'ExpenseController@update')->name($prefix.'.update');

    // DELETE
    Route::post('delete/{id}', 'ExpenseController@destroy')->name($prefix.'.destroy');
});
