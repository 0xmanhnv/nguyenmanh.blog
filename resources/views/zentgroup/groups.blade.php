@extends('zentgroup.layouts.master')

{{-- add script --}}
@section('css')
    <link href="{{ asset('blog_asset/css/style_custom.css') }}" rel="stylesheet" type="text/css"></link>
@endsection
{{-- end add script --}}

@section('content')
     <div class="card">
        <div class="header text-center">
            <h2>Groups Facebook</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
            				<th>Tên</th>
            				<th>Hành động</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach ($groups as $group)
	            			<tr>
	            				<td>{{ $group['name'] }}</td>
	    						<td>
	    							 <div class="btn-group">
										 <button type="button" class="btn btn-info">Vào</button>
										 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#group-{{ $group['id'] }}">Đăng bài</button>
										 <a href="{{ url('zentgroup/'.$group['id'].'/members') }}" class="btn btn-primary">Thành Viên</a>
									</div> 
	    						</td>
	            			</tr>
	            			<div id="group-{{ $group['id'] }}" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title text-center">{{ $group['name'] }}</h4>
							      </div>
							      <div class="modal-body">
							         <form method="post" action="{{ url('zentgroup/group/'.$group['id'].'/feed') }}">
							         	{{ csrf_field() }}
									  <div class="form-group form-float">
		                                    <div class="form-line">
		                                        <textarea name="messages" cols="30" rows="5" class="form-control no-resize" required></textarea>
		                                        <label class="form-label">messages</label>
		                                    </div>
		                                </div>
									  <button type="submit" class="btn btn-info">Đăng bài</button>
									</form> 
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
@endsection
