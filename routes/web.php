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

Route::redirect('/', '/folders');

Auth::routes();

Route::resource('files', 'FileController')->only([
    'store', 'destroy'
]);

Route::resource('folders', 'FolderController');
