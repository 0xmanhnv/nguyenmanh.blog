<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="{{ asset('blog_nguyenmanh/favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_nguyenmanh/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_nguyenmanh/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_nguyenmanh/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_nguyenmanh/css/customer.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_nguyenmanh/css/loader.css') }}">
        {{-- add css --}}
        @yield('css')
    </head>
    <body>
        {{-- loader --}}
        <div class="container">
            <div class="row">
                <div id="loader">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="lading"></div>
                </div>
            </div>
        </div>
        {{-- end loader --}}

        {{-- configure facebook --}}
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1395641663878197';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        {{-- end configure facebook --}}
        <div class="wraper-body">
            <header>
                <div class="container-fluild">
                    <nav class="navbar navbar-custome" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="/">Nguyễn Mạnh</a>
                            </div>
                    
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="/">Trang chủ</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Học lập trình<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/">Chém gió</a></li>
                                    <li><a href="/contact">Liên hệ</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <form  action="{{ route('blog.search') }}" method="get" class="navbar-form navbar-left" role="search">
                                        <div class="search">
                                            <input type="text" class="form-control-custom input-sm" maxlength="64" placeholder="Search" name="q" />
                                             <button type="submit" class="btn btn-secondary btn btn-default btn-sm">
                                                 <i class="fa fa-search" aria-hidden="true"></i>
                                             </button>
                                        </div>
                                    </form>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div>
            </header>
            <section class="content">
                <div class="container">
                    {{-- content --}}
                    @yield('content')
                    {{-- end content --}}
                </div>
            </section>

            <footer id="footer">
                <div class="container">
                    <div class="copyrights">
                        © Copyright 2017 | Designed by 
                        <a href="#" style="color:#f35045;">Nguyễn Mạnh</a>
                    </div>
                    <div class="social-ul">
                        
                    </div>
                </div>
            </footer>

            <!-- len dau trang -->
            <a href="#0" class="cd-top cd-is-visible cd-fade-out" title="Lên đầu trang"></a>
        </div>
    </body>
    <!-- jquery -->
    <script type="text/javascript" src="{{ asset('blog_nguyenmanh/js/jquery-3.2.1.min.js') }}"></script>
    <!-- bootstrap -->
    <script type="text/javascript" src="{{ asset('blog_nguyenmanh/js/bootstrap.min.js') }}"></script>
    <!-- css custom -->
    <script type="text/javascript" src="{{ asset('blog_nguyenmanh/js/customer.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            
            $("#loader").fadeOut(1000);
            $('.wraper-body').fadeIn( 2000);
        });
    </script>
    {{-- add script --}}
    @yield('script')
</html>