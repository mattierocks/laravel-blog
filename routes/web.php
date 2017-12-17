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

// Blog Pages
Route::get('/blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

// Contact Page
Route::get('contact', 'PagesController@getContact');

// About Page
Route::get('about', 'PagesController@getAbout');

//Home Page
Route::get('/', 'PagesController@getIndex');

//Resources (Posts)
Route::resource('posts', 'PostController');