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
Route::get('/hellos', function(){
    $arr   = DB::select('select * from test');
    return view('city')->with('arr',$arr);
});
Route::get('/hello', 'HelloController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::any('index','HomeController@index');
Route::any('login','HomeController@login');
Route::any('sign','HomeController@sign');
Route::any('register','HomeController@register');
Route::any('signOut','HomeController@signOut');
Route::any('search','HomeController@search');

Route::any('home','HomeController@home');
Route::any('add','HomeController@add');
Route::any('show','HomeController@show');
Route::any('delete','HomeController@delete');
Route::any('upload','HomeController@upload');
Route::any('upl','HomeController@upl');

Route::get('/ss', function(){
    echo "OJBK??";
});
