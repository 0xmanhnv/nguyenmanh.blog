<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\User;
use App\Models\Tag;
use DB;
use Input;
use View;

class BlogController extends Controller
{

    public function __construct()
    {
        /**
         * share categories
         */
        View::share('categories', Category::where('status', 1)->get());
        /**
         * share tags
         */
        View::share('tags', Tag::where('status', 1)->get());   
    }
	/**
	 * show index
	 * @return [type] [description]
	 */
    public function index(){
    	/**
    	 * get post status = 1
    	 * join category _id
    	 * @var [type]
    	 */
    	$posts 	= Post::where('posts.status','=', 1)
    			->join('categories', 'category_id', '=', 'categories.id')
    			->join('users', 'user_id', '=', 'users.id')
    			->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.name as author')
    			->paginate(15);

    
        
    	return view('blog.index',[
    		'posts' => $posts,
    	]);
    }

    /**
     * show categories
     * @return [type] [description]
     */
    public function categories(){
        $categories = Category::where('status', '=', 1)->paginate(15);

        // dd($categories);
        return view('blog.categories.index');
    }



    /**
     * Search post
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showResultSearch(Request $request){
        $tuKhoa =  $request->Input('q');

        if($tuKhoa != ""){
            $posts = Post::where('status', 1)
                        ->where(function($query) use ($tuKhoa) {
                            return $query->where('title', 'like', "%$tuKhoa%")
                                        ->orWhere('description', 'like', "%$tuKhoa%");
                        })
                        ->take(30)
                        ->paginate(5);
            $posts->setPath('?q='.$tuKhoa);

            return view('blog.search', [
                'posts' => $posts,
                'tuKhoa' =>$tuKhoa
            ]);
        }else{
            return view('blog.search',[
            'tuKhoa' => $tuKhoa
            ]);
        }
    }

    /**
     * post detail
     * @param  [type] $slug [description]
     * @param  [type] $id   [description]
     * @return [type]       [description]
     */
    public function showDetailPost($id, $slug){
        $post = Post::where(
                'id', '=', $id,
                'and', 
                'slug', '=', $slug,
                'and', 
                'status', '=', 1
                )
                ->get()
                ->first();
        

        return view('blog.post',[
            'post' => $post,
        ]);
    }

    /**
     * get category = slug and id
     * 
     */
    public function showDetailCategory($id, $slug){
        $category = Category::where(
                    'id', '=', $id,
                    'and',
                    'status', '=', 1
                    )
                    ->with(['posts' => function($queryPosts){
                        $queryPosts->with(['author' => function($queryAuthor){
                            $queryAuthor->select('id','name');
                        }]);
                    }])
                    ->get()
                    ->first();

        return view('blog.category', [
            'posts' => $category->posts,
            'category' => $category
        ]);
    }

    /**
     * Post of author
     */
    public function showDetailAuthor($id){
        $user = User::find($id)->first();


        return view('blog.author', [
            'user' => $user,
        ]);
    }

    public function showDetailTag($id, $slug){
        $tag = Tag::where(
            'id', '=', $id,
            'and',
            'slug', '=', $slug
        )
        ->get()->first();

        return view('blog.tag', [
            'tag' => $tag,
        ]);
    }
}
