<?php

// for guest only
Route::group(array('before' => 'guest'), function()
{

	Route::get('login', array('as' => 'login', 'uses' => 'UserController@login'));
	Route::post('login', array('uses' => 'UserController@doLogin'));
	Route::get('register', array('as' => 'register', 'uses' => 'UserController@register'));
	Route::post('register', array('uses' => 'UserController@doRegister'));
});

// for any logged in user
Route::group(array('before' => 'auth'), function()
{
	
	Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
});

// for user
Route::group(array('before' => 'auth|user'), function()
{
	
});


// for admin
Route::group(array('before' => 'auth|admin'), function()
{
	Route::get('home', array('as' => 'home', 'uses' => 'UserController@home'));

	//areas
	Route::get('locations', array('as' => 'location.index', 'uses' => 'LocationController@index'));
	Route::get('location/create', array('as' => 'location.create', 'uses' => 'LocationController@create'));
	Route::post('location/create', array('as' => 'location.create', 'uses' => 'LocationController@store'));
	Route::get('location/edit/{id}', array('as' => 'location.edit', 'uses' => 'LocationController@edit'));
	Route::put('location/edit/{id}', array('as' => 'location.edit', 'uses' => 'LocationController@update'));
	Route::get('location/delete/{id}', array('as' => 'location.delete', 'uses' => 'LocationController@delete'));

	//lockers
	Route::get('contructors', array('as' => 'contructor.index', 'uses' => 'ContructorController@index'));
	Route::get('contructor/create', array('as' => 'contructor.create', 'uses' => 'ContructorController@create'));
	Route::post('contructor/create', array('as' => 'contructor.create', 'uses' => 'ContructorController@store'));
	Route::get('contructor/edit/{id}', array('as' => 'contructor.edit', 'uses' => 'ContructorController@edit'));
	Route::put('contructor/edit/{id}', array('as' => 'contructor.edit', 'uses' => 'ContructorController@update'));
	Route::get('contructor/delete/{id}', array('as' => 'contructor.delete', 'uses' => 'ContructorController@delete'));

	Route::get('visits', array('as' => 'visit.show', 'uses' => 'VisitController@show'));
});



// public pages [ keep them at last]
Route::get('/', array('as' => 'guest', 'uses' => 'UserController@guest'));