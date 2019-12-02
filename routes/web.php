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

use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});

Route::get('vendor/{any}', function ($any) {
    abort_unless(is_readable(public_path("doc/vendor/$any")), 404);
    return File::get(public_path("doc/vendor/$any"));
})->where('any', ".*");
Route::get('css/{any}', function ($any) {
    abort_unless(is_readable(public_path("doc/css/$any")), 404);
    return File::get(public_path("doc/css/$any"));
})->where('any', ".*");
Route::get('img/{any}', function ($any) {
    abort_unless(is_readable(public_path("doc/img/$any")), 404);
    return File::get(public_path("doc/img/$any"));
})->where('any', ".*");
Route::get('js/{any}', function ($any) {
    abort_unless(is_readable(public_path("doc/js/$any")), 404);
    return File::get(public_path("doc/js/$any"));
})->where('any', ".*");
Route::get('utils/{any}', function ($any) {
    abort_unless(is_readable(public_path("doc/utils/$any")), 404);
    return File::get(public_path("doc/utils/$any"));
})->where('any', ".*");
Route::get('locales/{any}', function ($any) {
    abort_unless(is_readable(public_path("doc/locales/$any")), 404);
    return File::get(public_path("doc/locales/$any"));
})->where('any', ".*");

Route::get('/apidoc', function(){
    return File::get(public_path() . '/doc/index.html');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
