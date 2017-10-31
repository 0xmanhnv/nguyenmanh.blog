<?php


Route::get('/', function () {
    return redirect()->route('blog.index');
});

Route::group(['prefix' => 'blog'], function(){
	Route::get('/', 'Blog\BlogController@index')->name('blog.index');
});
