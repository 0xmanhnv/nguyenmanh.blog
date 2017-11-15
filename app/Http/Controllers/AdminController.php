<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Datatables;
use Cookie;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin');
    }
	/**
	 * show index
	 * @return [type] [description]
	 */
    public function index(){
        $countPosts = Post::where('status', 1)->count();

    	return view('admin.index',[
            'countPosts' => (string) $countPosts,
        ]);
    }
    /**
     * show all post
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function posts(Request $request){

    	return view('admin.posts')->withCookie(Cookie::queue(Cookie::forget('success')));
    }
}
