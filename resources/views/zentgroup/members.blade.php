@extends('zentgroup.layouts.master')

{{-- add script --}}
@section('css')
    <link href="{{ asset('blog_asset/css/style_custom.css') }}" rel="stylesheet" type="text/css"></link>
@endsection
{{-- end add script --}}

@section('content')
     <div class="card">
        <div class="header text-center">
            <h2>{{ 'Thành Viên' }}</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
            				<th>Tên</th>
                            <th>Admin</th>
            				<th>Hành động</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach ($members as $member)
	            			<tr>
	            				<td>{{ $member['name'] }}</td>
                                <td>
                                    @if($member['administrator'])
                                        {{ '1' }}
                                    @endif
                                </td>
	    						<td>
	    							 <div class="btn-group">
										 <button type="button" class="btn btn-info">Vào</button>
										 <button type="button" class="btn btn-danger">Đăng bài</button>
										 <a href="{{ url('zentgroup/'.$member['id'].'/members') }}" class="btn btn-primary">Thành Viên</a>
									</div> 
	    						</td>
	            			</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
@endsection
