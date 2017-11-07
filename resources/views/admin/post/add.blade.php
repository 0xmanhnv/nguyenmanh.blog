@extends('admin.layouts.master')

{{-- add css --}}
@section('css')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('admin_nguyenmanh/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection
{{-- end add css --}}


@section('content')
  {{-- alert create_post --}}
  @if(!is_null(Cookie::get('success')))
    <div class="popupunder alert alert-success fade in">
      <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="glyphicon glyphicon-remove"></i>
      </button>
      <strong>Success : </strong> {{ Cookie::get('success') }}
    </div>
  @endif
  {{-- end alert --}}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">NỘI DUNG
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="title-post">Title:</label>
              <input type="text" class="form-control" id="title-post" name="title" placeholder="Tiêu đề bài viết">
            </div>
            <div class="form-group">
              <label for="description-post">Description:</label>
              <textarea class="form-control" rows="5" id="description-post" name="description" value="{{ old('description') }}">
                
              </textarea>
            </div> 
            <div class="form-group">
              <label for="category-post">Select list:</label>
              <select class="form-control" id="category-post" name="category_id">
                @if(isset($categories))
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                @endif
              </select>
            </div> 
            <div class="form-group">
              <textarea id="editor-post" name="content" rows="50" cols="80" placeholder="Thêm nội dung bài viết....">
                {{ old('content') }}
              </textarea>
            </div>
            <div class="pull-right box-tools">
              <button type="submit" class="btn btn-success">Cập nhật</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection

{{-- add script --}}
@section('script')
  <script src="{{ asset('admin_nguyenmanh/bower_components/ckeditor/ckeditor.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('admin_nguyenmanh/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <script>
    $(function () {
      CKEDITOR.replace('editor-post');
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5();
    })
  </script>
@endsection
{{-- end add script --}}