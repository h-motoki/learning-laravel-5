<?php

interface BarInterface {}

class Bar implements BarInterface {}
class SecondBar implements BarInterface {}

if (Config::get('app.debug')) {
	App::bind('BarInterface', 'Bar');
}
else {
	App::bind('BarInterface', 'SecondBar');
}

Route::get('bar', function(BarInterface $bar) {
	dd($bar);
});

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
