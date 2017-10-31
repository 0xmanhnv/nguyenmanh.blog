<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
    	/**
    	 * get post status = 1
    	 * join category _id
    	 * @var [type]
    	 */
    	$posts 	= Post::where('posts.status','=', 1)
    			->join('categories', 'category_id', '=', 'categories.id')
    			->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug')
    			->paginate(15);

    	$categories = Category::where('status', '=', 1)->get();

    	// dd($posts);

    	return view('blog.index',[
    		'posts' => $posts,
    	]);
    }
}
