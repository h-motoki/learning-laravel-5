<?php

Route::resource('articles', 'ArticlesController');

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('foo', ['middleware' => 'manager', function () {
	return 'this page may only be viewed by managers';
}]);