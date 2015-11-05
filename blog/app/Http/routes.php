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


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


get('blog','BlogController@index');
get('blog/{slug}','BlogController@showPost');
get('newroute','BlogController@sayHello');
get('newroute2','BlogController@showFirstPost');
get('photos','BlogController@showPostImages');




Route::get('home', function() {
  return 'Logged In';
});






Route::get('/newpage', function() {
    return 'Content for new page';
});

Route::get('/newpage2', function() {
    return 'Content for new page 2';
});

Route::get('/user/{id}', function($id) {
    return 'You want to update user ' . $id;
});

Route::get('/shoes', ['middleware' => 'auth', function() {
    return '<img src="http://timpfest.org/wp-content/uploads/2013/09/Converse-Shoes.jpg"/>';
}]);

Route::get('/newpage3', function() {
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
