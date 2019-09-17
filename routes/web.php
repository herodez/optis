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

Route::get('/test', function (){
//    event(new \App\Events\RepositoryUpdated());
    abort(404);
});

Route::get('/packages.json', 'RepositoryController@getPackageConfig');
Route::get('/include/{packageInfo}.json', 'RepositoryController@getPackagesList');
Route::get('/repository/dist/{packageFile}', 'RepositoryController@getPackageFile')
    ->where('packageFile', '.*');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'HomeController@settings')->name('settings');
Route::get('/my-packages', 'HomeController@myPackages')->name('my-packages');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/submit', 'HomeController@submit')->name('submit');
Route::post('/submit', 'HomeController@uploadPackage')->name('upload-package');
