<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Datatables;
use Cookie;

class AdminPostController extends Controller
{
 	/**
     * [datatablesPosts description]
     * @return [type] [description]
     */
    public function datatablesPosts(){
    	$posts = Post::where('status', 1)->get();

    	return Datatables($posts)
    			->addColumn('action', function ($post) {
    				 return ' 		
    				 		<button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#detail-post-'.$post->id.'"><i class="glyphicon glyphicon-hand-right"></i> Xem</button>
                  <!-- Modal -->
                  <div id="detail-post-'.$post->id.'" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header header-modal-custom">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">'. $post->title .'</h4>
                        </div>
                        <div class="modal-body">
                          <img src="'.$post->thumbnail.'" alt="" style="max-width: 100%;">
                          <p>'.$post->content.'</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
    				 		<a href="post/'.$post->id.'/edit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Sửa</a>
                <form action="post/delete" method="post">
                  <input type="hidden" name="_token" value="'.csrf_token().'">
                  <input type="hidden" name="id" value="'.$post->id.'">
                  <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i>Xóa
                  </button>
                </form>
    				 		';
    			})
    			->make(true);
    }   

    /**
     * add bai viet ||post ||get
     * @return [type] [description]
     */
    public function getAdd(Request $request){
      $categories = Category::where('status', 1)->get();


      return view('admin.post.add',[
              'categories' => $categories
      ])->withCookie(Cookie::queue(Cookie::forget('success')));
    }

    public function postAdd(Request $request){
      $data = $request->all();
      unset($data['_token']);
      $data['slug'] = str_slug($data['title']);
      $data['user_id'] = 1;

      Post::add($data);
      
      return redirect()->back()->withCookie(cookie('success', 'Thêm một bài viết thành công!', time() + 5, '/'));
    }

    /**
     * edit post || get || post
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getEdit($id){
      $post = Post::find($id);

      return view('admin.post.edit', [
        'post' => $post
      ])->withCookie(Cookie::queue(Cookie::forget('success')));
    }

    public function postEdit($id, Request $request){
      $data = $request->all();
      unset($data['_token']);
      $data['slug'] = str_slug($data['title']);


      Post::where('id', $id)->update($data);

      return redirect()->back()->withCookie(cookie('success', 'Cập nhật bài viết thành công!', time() + 5, '/'));
    }

    /**
     * post destroy
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postDestroy(Request $request){
      $data = $request->all();
      Post::destroy($data['id']);

      return redirect()->back()->withCookie(cookie('success', 'Đã xóa bài viết!', time() + 5, '/'));
    }
}
