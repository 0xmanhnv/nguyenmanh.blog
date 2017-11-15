<?php

use App\Models\Post;

// Route::get('uploads', function(){
// 	return view('admin.uploadsFile');
// });

// Route::get('dropzone', 'HomeController@dropzone');
Route::get('editor', function(){
	return view("editor");
});

Route::post('dropzone/store', ['as'=>'dropzone.store','uses'=>'HomeController@dropzoneStore']);

/**
	 *  Admin Authentication Routes...
	 */
Route::get('admin/login', 'Admin\Auth\AdminLoginController@showLoginForm');
Route::post('admin/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');

Route::group(['prefix' => '/'], function(){
	Route::get('/', 'Blog\BlogController@index');

	/**
	 * contact
	 */
	Route::get('contact', function(){
		return view('blog.contact');
	});
});


/**
 * /admin
 * thao tac voi quyen admin
 */
Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.index');


	Route::get('posts', 'AdminController@posts')->name('admin.posts');

	/**
	 * admin/post
	 * thao tac voi model post
	 */
	Route::group(['prefix' => 'post'], function(){
		/**
		 * edit
		 */
		Route::get('{id}/edit', 'Admin\AdminPostController@getEdit');
		Route::post('{id}/edit', 'Admin\AdminPostController@postEdit');

		/**
		 * add
		 */
		Route::get('add', 'Admin\AdminPostController@getAdd');
		Route::post('add', 'Admin\AdminPostController@postAdd');

		/**
		 * delete
		 */
		Route::post('delete', 'Admin\AdminPostController@postDestroy');

	});

	/**
	 * admin/json
	 */
	Route::group(['prefix'=>'json'], function(){

		/**
		 * admin/json/posts
		 */
		Route::get('posts', 'Admin\AdminPostController@datatablesPosts');
	});
});


/**
 * /blog
 */
Route::group(['prefix' => 'blog'], function(){
	/**
	 * /blog
	 */
	Route::get('/', 'Blog\BlogController@index')->name('blog.index');
	/**
	 * search
	 */
	Route::get('/search', 'Blog\BlogController@showResultSearch')->name('blog.search');

	Route::get('post/{slug}/{id}', 'Blog\BlogController@showDetailPost')->name('blog.post');
	Route::get('category/{id}/{slug}', 'Blog\BlogController@showDetailCategory')->name('blog.category');

	Route::get('tag/{id}/{slug}', 'Blog\BlogController@showDetailTag');

	Route::get('author/{id}', 'Blog\BlogController@showDetailAuthor')->name('blog.author');
});




// /**
//  * Facebook ***************************************************
//  */
// Route::get('user', 'Auth\LoginFacebookController@postToUser');
// Route::get('friend', 'Auth\LoginFacebookController@getIdFriend');

// Route::group(['prefix' => 'facebook'],function(){
// 	Route::get('login', 'Auth\LoginFacebookController@login');
// 	Route::get('callback', 'Auth\LoginFacebookController@callback');
// });

// Route::group(['prefix' => 'zentgroup'], function(){
// 	Route::get('/', 'Auth\LoginFacebookController@index');
// 	Route::get('groups', 'Auth\LoginFacebookController@groups');
// 	Route::get('{id}/members', 'Auth\LoginFacebookController@members');

// 	Route::post('group/{id}/feed', 'Auth\LoginFacebookController@postToGroup');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
