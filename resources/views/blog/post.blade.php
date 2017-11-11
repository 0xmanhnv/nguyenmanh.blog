@extends('blog.layouts.master')

@section('title')
	@if(isset($post->title)) {{ $post->title }} @endif
@endsection

{{-- add meta --}}
<meta property="og:url"           content="{{ url()->current() }}" />
<meta property="og:type"          content="" />
<meta property="og:title"         content="@if($post) {{ $post->title }} @endif" />
<meta property="og:description"   content="@if($post) {{ $post->description }} @endif" />
<meta property="og:image"         content="http://android.coloawap.net/wp-content/uploads/2014/01/710.png" />
{{-- end add meta --}}
{{-- {{ dd($post) }} --}}
@section('content')
	<div class="col-xs-12 col-sm-8 col-md-8">
		@if(isset($post))
		    <div class="post-detail-box">
		    	<h1 class="title">{{ $post->title }}</h1>
		    	<div class="img-post">
		    		<div class="embed-responsive embed-responsive-16by9">
		    			<img src="{{ $post->thumbnail }}">
		    		</div>
		    	</div>
		    	<div class="content-post">
		    		{!!  $post->content !!}
		    	</div>
		    	<div class="share-post">
			    	<div class="share">
			    		<h3 class="sd-title">Chia sẻ</h3>
			    		<ul class="social-network social-circle">
			    			{{-- share facebook --}}
			    			<li>
			    				<div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2F&amp;src=sdkpreparse">Share</a></div>
			    			</li>
			    			{{-- end share facebook --}}
			    		</ul>
			    	</div>
			    	<div class="share">
			    		<h3 class="sd-title">
			    			Tags:
			    			@foreach ($post->tags as $tag)
			    				<a href="{{ url('blog/tag/'.$tag->id.'/'.$tag->slug ) }}" class="tag">
			    					<span>{{ $tag->name }}</span>
			    				</a>
			    			@endforeach
			    		</h3>
			    	</div>
			    	<div class="share">
			    		<div class="author-info">
			    			<div class="author-avatar">
			    				<img src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/23032754_1319030634909161_8414838974445845780_n.jpg?oh=ff67e0299b2a3e30c556bac49c904748&oe=5A69004F" class="avatar avatar-96 photo im-responsive" style="max-width: 100px;">
			    			</div>
			    			<div class="author-description">
			    				<h3 class="author-title">
			    					<a href="#" class="author-link">{{ $post->author->user_name }}</a>
			    				</h3>
			    				<p>{{ $post->author->email }}</p>
			    				<div class="icon-social-follow">
									<div class="fb-follow" data-href="https://www.facebook.com/nguyenmanh1997" data-layout="button_count" data-size="small" data-show-faces="true"></div>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="share">
			    		<div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
			    	</div>
			    </div>
		    </div>
	    @endif
	</div>
	
	{{-- sidebar right --}}
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