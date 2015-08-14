<?php

Route::get('foo', 'FooController@foo');

Route::get('/', function () {
	return 'OK';
});

Route::resource('articles', 'ArticlesController');

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
