<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => true,
]);

Route::middleware(['auth'])->namespace('Web')->group(function () {
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    require 'web/dashboard.php';
    require 'web/category.php';
    require 'web/role.php';
    require 'web/user.php';
    require 'web/expense.php';
});
