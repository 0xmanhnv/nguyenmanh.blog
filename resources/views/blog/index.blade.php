@extends('blog.layouts.master')


@section('content')
    <div class="col-xs-12 col-sm-8 col-md-8">
        @if(isset($posts))
            @foreach ($posts as $post)
                <article class="row article">
                    <div class="col-xs-12">
                        <div class="block-postMeta postMeta-previewHeader">
                            <div class="u-floatLeft">
                                <div class="postMetaInline-avatar">
                                    <a class="link avatar u-color--link" href="#">
                                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/23032754_1319030634909161_8414838974445845780_n.jpg?oh=ff67e0299b2a3e30c556bac49c904748&oe=5A69004F">
                                    </a>
                                </div>
                                <div class="postMetaInline-feedSummary">
                                    <a class="link link--darken link--accent u-accentColor--textNormal u-accentColor--textDarken u-color--link user-link" href="{{ url('blog/user/'.$post->user_id) }}">
                                        {{ $post->author }}
                                    </a>
                                    <span class="POSTMETAINLINE postMetaInline--supplemental">
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img src="{{ $post->thumbnail }}" style="min-width: 100%; max-width: 100%;" alt="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="{{ url('blog/'.$post->id.'/'.$post->slug) }}">
                            <h3 class="title">{{ $post->title }}</h3>
                        </a>
                        <span>
                            {{ \Illuminate\Support\Str::words($post->description , 30, ' ...') }}
                            <a class="see-more" href="{{ url('blog/'.$post->id.'/'.$post->slug) }}"> Xem thêm</a>
                        </span>
                    </div>
                </article>
            @endforeach
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        {{-- categories --}}
         @if(isset($categories))
            <div class="panel panel-custome">
                <div class="panel-heading bg-success">
                    <h3 class="panel-title text-center" style="line-height: 30px; font-weight: bold;">
                        DANH MỤC
                    </h3>
                </div>
                <div class="panel-body panel-body-custome panel-body-facebook">
                    <ul class="list list--withIcon list--withTitleSubtitle">
                        @foreach ($categories as $category)
                            <li class="list-item">
                                <button class="button button--circle u-disablePointerEvents">
                                    <span class="list-index">
                                        <img src="https://giaphiep.com/images/laravel.png">
                                    </span>
                                </button>
                                <div class="list-itemInfo">
                                    <h4 class="list-itemTitle">
                                        <a href="{{ url('blog/category/'.$category->id.'/'.$category->slug) }}" class="link  link-custome link--primary u-accentColor--textNormal"> 
                                            {{ $category->name }}
                                        </a>
                                    </h4>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        {{-- end categories --}}

        {{-- Tags --}}
        @if(isset($tags)) 
            <div class="panel panel-custome">
                <div class="panel-heading bg-info">
                    <h3 class="panel-title text-center" style="line-height: 30px; font-weight: bold;">
                        Tags
                    </h3>
                </div>
                <div class="panel-body panel-body-custome panel-body-facebook">
                    @foreach ($tags as $tag)
                        <a href="{{ url('blog/tag/'.$tag->id.'/'.$tag->slug) }}" class="tag">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        @endif
        {{-- end tags --}}

        {{-- add widgets --}}
        @yield('widgets')
        {{-- end add widgets --}}
    </div>
@endsection

