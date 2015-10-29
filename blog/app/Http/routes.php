<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('/blog');
});

get('blog','BlogController@index');
get('blog/{slug}','BlogController@showPost');






Route::get('/newpage', function() {
    return 'Content for new page';
});

Route::get('/newpage2', function() {
    return 'Content for new page 2';
});

Route::get('/user/{id}', function($id) {
    return 'You want to update user ' . $id;
});

Route::get('/shoes',function() {
    return '<img src="http://skate.boardnews.pl/wp-content/uploads/2014/02/low-second.jpg"/>';
});

Route::get('/newpage3',function() {
    return view('newpage3',['name' => 'kaehler']);
});
Route::get('/oldrelease', function () {
    //return view('welcome');
    return view('oldrelease');
});
Route::get('/newrelease', function () {
    //return view('welcome');
    return view('newrelease');
});
