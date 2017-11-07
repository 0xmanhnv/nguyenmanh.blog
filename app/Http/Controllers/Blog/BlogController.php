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
class BlogController extends Controller
{
    private $categories;
    private $tags;

    public function __construct()
    {
        $this->categories = Category::where('status', 1)->get();
        $this->tags = Tag::where('status', 1)->get();
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
    			->select('posts.*', 'categories.name as category_name', 'categories.slug as category_slug', 'users.user_name as author')
    			->paginate(15);

    
        
    	return view('blog.index',[
    		'posts' => $posts,
    		'categories' => $this->categories,
            'tags' => $this->tags
    	]);
    }


    /**
     * Search post
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function search(Request $request){
        $tuKhoa =  $request->Input('q');


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
    }

    /**
     * show categories
     * @return [type] [description]
     */
    public function categories(){
    	$categories = Category::where('status', '=', 1)->paginate(15);

    	// dd($categories);
    	return view('blog.categories.index', [
    		'categories' => $categories,
            'tags' => $this->tags
    	]);
    }

    /**
     * post detail
     * @param  [type] $slug [description]
     * @param  [type] $id   [description]
     * @return [type]       [description]
     */
    public function post($id, $slug){
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
            'categories' => $this->categories,
            'tags' => $this->tags
        ]);
    }

    /**
     * get category = slug and id
     * 
     */
    public function category($id, $slug){
        $category = Category::where(
                    'id', '=', $id,
                    'and',
                    'status', '=', 1
                    )
                    ->with(['posts' => function($queryPosts){
                        $queryPosts->with(['author' => function($queryAuthor){
                            $queryAuthor->select('id','user_name');
                        }]);
                    }])
                    ->get()
                    ->first();

        return view('blog.category', [
            'posts' => $category->posts,
            'categories' => $this->categories,
            'tags' => $this->tags,
            'category' => $category
        ]);
    }

    /**
     * Post of user
     */
    public function user($id){
        $user = User::find($id);

        return view('blog.user', [
            'posts' => $user,
        ]);
    }

    public function tag($id, $slug){
        $posts = Tag::where('status', 1);
    }
}
