@extends('blog.layouts.master')

@section('content')
	<div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header text-center">
                    <h2>Tất cả bài viết</h2>
                </div>
                <div class="body">
                	@foreach($posts as $post)
                        <div class="media">
    	                    <div class="media-left">
    	                        <a href="javascript:void(0);">
    	                            <img class="media-object" src="{{ $post->thumbnail }}" width="64" height="64">
    	                        </a>
    	                    </div>
    	                    <div class="media-body">
    	                        <a href="{{ $post->slug }}">
                                    <h4 class="media-heading">{{ $post->title }}</h4>
                                </a> 
                                {{ $post->description }}
    	                    </div>
    	                </div>
                    @endforeach
                    <div class="text-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebarRight')
	<div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header text-center">
                    <h2>Sidebar</h2>
                </div>
                <div class="body">
                    <div id="real_time_chart" class="dashboard-flot-chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection