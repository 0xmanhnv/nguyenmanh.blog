@extends('blog.layouts.master')

{{-- add script --}}
@section('css')
    <link href="{{ asset('blog_asset/css/style_custom.css') }}" rel="stylesheet" type="text/css"></link>
@endsection
{{-- end add script --}}

@section('content')
    <div class="card">
        <div class="header text-center">
            <h2><u>CATEGORY:</u> {{ $category->name }}</h2>
        </div>
        <div class="body">
        	@foreach($posts as $post)
                <div class="media media-post" >
                    <div class="col-md-4">
                        <div class="media-left">
                            <a href="javascript:void(0);">
                                <img class="media-object media-post-thumbnail" src="{{ $post->thumbnail }}" >
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="media-body">
                            <a href="{{ $post->slug }}" class="media-post-title">
                                <h4 class="media-heading">{{ $post->title }}</h4>
                            </a>
                            <div class="media-post-info">
                                {{-- <a href="{{ $post->category_slug }}" class="media-post-category"> --}}
                                   {{--  <span class="label label-danger">{{ $post->category_name }}</span> --}}
                                {{-- </a> --}}
                                <a href="" class="media-post-author">
                                     <span class="label label-danger">Tác giả: </span>
                                    {{ $post->author }}
                                </a>
                            </div>
                            <div class="media-post-description">
                                {{ \Illuminate\Support\Str::words($post->description , 20, ' ...') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

@section('sidebarRight')
    <div class="card">
        <div class="header text-center">
            <h2>Sidebar</h2>
        </div>
        <div class="body">
            <div id="real_time_chart" class="dashboard-flot-chart"></div>
        </div>
    </div>
@endsection
