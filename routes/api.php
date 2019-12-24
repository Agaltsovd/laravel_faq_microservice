<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/categories', 'CategoriesController@getAll');
Route::get('/category/{id}', 'CategoriesController@get');
Route::post('/category', 'CategoriesController@create');
Route::put('/category/{id}', 'CategoriesController@update');
Route::delete('/category/{id}', 'CategoriesController@delete');
Route::get('/faqs','FaqController@getAll');
Route::get('/faq/{id}','FaqController@get');
Route::post('/faq','FaqController@create');
Route::put('/faq/{id}','FaqController@update');
Route::delete('/faq/{id}','FaqController@delete');
Route::get('faqtags','FaqTagsController@getAll');
Route::get('faqtag/{id}','FaqTagsController@get');
Route::put('faqtag/{id}','FaqTagsController@update');
Route::post('faqtag','FaqTagsController@create');
Route::delete('faqtag/{id}','FaqTagsController@delete');
Route::get('tags','TagsController@getAll');
Route::get('tag/{id}','TagsController@get');
Route::post('tag','TagsController@create');
Route::put('tag/{id}','TagsController@update');
Route::delete('tag/{id}','TagsController@delete');
Route::get('categories/withFaq','CategoriesController@getAllWithFaq');
