<?php

Route::resource('articles', 'ArticlesController');

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

