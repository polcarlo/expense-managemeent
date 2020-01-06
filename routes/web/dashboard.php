<?php

$prefix = config('web.dashboard.prefix');

Route::get('/', 'DashboardController@index')->name($prefix.'.index');
