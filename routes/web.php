<?php


Route::get('/', function () {
    return redirect()->route('blog.index');
});

Route::group(['prefix' => 'facebook'],function(){
	Route::get('login', 'Auth\LoginFacebookController@login');
	Route::get('callback', 'Auth\LoginFacebookController@callback');
});

Route::group(['prefix' => 'zentgroup'], function(){
	Route::get('/', 'Auth\LoginFacebookController@index');
	Route::get('groups', 'Auth\LoginFacebookController@groups');
	Route::get('{id}/members', 'Auth\LoginFacebookController@members');

	Route::post('group/{id}/feed', 'Auth\LoginFacebookController@postToGroup');
});

Route::group(['prefix' => 'blog'], function(){
	/**
	 * /blog
	 */
	Route::get('/', 'Blog\BlogController@index')->name('blog.index');

	/**
	 * /Categories
	 */
	Route::group(['prefix'=>'categories'], function(){
		/**
		 * categories/
		 */
		Route::get('/', 'Blog\BlogController@categories');

		/**
		 * categories/{id_category}{slug}
		 */
		Route::get('/{id}/{slug}', 'Blog\CategoryController@getAllPosts');
	});
});
