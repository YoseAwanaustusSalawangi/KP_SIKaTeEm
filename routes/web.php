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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('keluar', function () {
    \Auth:: logout();
    return redirect('/');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search','HomeController@search');

// Route::get('/homeadmin', 'AdminController@index')->name('homeadmin');
Route::get('/homeadmin/tambah', 'AdminController@tambah');
Route::get('/homeadmin/cetak-data-ktm', 'AdminController@cetak_pdf');
Route::post('/homeadmin/simpan', 'AdminController@simpan');
Route::get('/homeadmin/edit/{id}', 'AdminController@edit');
Route::put('/homeadmin/updated/{id}', 'AdminController@updated');
Route::get('/homeadmin/delete/{id}', 'AdminController@delete');

Route::get('/homeadmin/upload/{nim}','AdminController@upload');
Route::post('/homeadmin/upload','AdminController@proses_upload');

Route::get('/homeadmin/search','AdminController@search');

// Route::get('/homeoperator', 'OperatorController@index')->name('homeoperator');
Route::get('/homeoperator/search','OperatorController@search');
Route::post('/homeoperator/pilih','OperatorController@verifikasi');