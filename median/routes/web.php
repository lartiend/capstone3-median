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
Auth::routes();


Route::get('/', 'LandingController@landing');
Route::post('/newsletter', 'NewsletterController@store');
Route::get('/search', 'SearchController@searchForm');
Route::post('/search', 'SearchController@searchprocess');



Route::group(['middleware' => 'auth'], function () {
	
	Route::group(['middleware' => 'admin'], function () {
		Route::get('/admin', 'AdminController@index');
		Route::put('/admin/user/{userID}', 'AdminController@toggleStatus');
		Route::delete('/admin/{article}', 'AdminController@deleteArticle');
	});

	Route::post('/bookmarks', 'BookmarkController@addToBookmark');
	Route::post('/follows', 'FollowController@addToFollow');

	Route::get('/tags/{tags}', 'TagController@viewTagArticles');
	Route::get('/interests/{user}', 'InterestsController@viewInterests');
	Route::get('/profile/{user}', 'ProfileController@viewProfile');
	Route::post('/profile/{user}/follows', 'ProfileController@addToFollow');
	Route::get('/settings/{settings}', 'SettingController@edit');
	Route::put('/settings/{settings}', 'SettingController@update');
	Route::delete('/settings/{settings}', 'SettingController@destroy');
	Route::post('/articles/{article}/rate', 'ArticleController@addRate');

	Route::resource('/articles', 'ArticleController');
	Route::resource('articles.comments', 'ArticleCommentController');
	Route::resource('articles.tags', 'ArticleTagController');

});

