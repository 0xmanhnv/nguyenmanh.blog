@extends('admin.layouts.master')

{{-- add css --}}
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin_nguyenmanh/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
{{-- end add css --}}

{{-- content waraper --}}
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
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="posts-table" class="table table-condensed table-bordered">
            <thead>
              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">title</th>
                <th class="text-center">Ngày tạo</th>
                <th class="text-center">Hành động</th>
              </tr>
            </thead>
          </table>
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection
{{-- end content warapper --}}

{{-- add script --}}
@section('script')
  <!-- DataTables -->
  <script src="{{ asset('admin_nguyenmanh/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin_nguyenmanh/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">
    $(function () {
      $('#posts-table').DataTable( {
          processing: true,
          serverSide: true,
          responsive:true,
          "ajax": "http://127.0.0.1:8000/admin/json/posts",
          "columns": [
              { "data": "id" },
              { "data": "title"},
              { "data": "created_at" },
              { "data": "action", orderable: false, searchable: false},
          ]
      } );
    });
  </script>
@endsection
{{-- end add script --}}