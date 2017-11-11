<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;


class CategoryController extends Controller
{
	/**
	 * get all posts in category
	 * @param  [type] $id   [description]
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
    public function getAllPosts($id, $slug){
    	$category = Category::where([
    		['id', '=', $id],
    		['slug', '=', $slug]
    	])->first();

    	if($category != null){
    		$posts = Post::where([
		    		['category_id', '=', $id],
		    		['status', '=', 1]
		    	])
	    		->join('users', 'user_id', '=', 'users.id')
	    		->select('posts.*', 'users.name as author')
    			->paginate(10);
    		return view('blog.categories.posts', [
	    		'posts' => $posts,
	    		'category' => $category,
	    	]);
    	}else{
    		return view('errors.404');
    	}
    }
}
