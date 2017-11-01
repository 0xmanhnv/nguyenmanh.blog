@extends('blog.layouts.master')

{{-- add script --}}
@section('css')
    <link href="{{ asset('blog_asset/css/style_custom.css') }}" rel="stylesheet" type="text/css"></link>
@endsection
{{-- end add script --}}

@section('content')
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-6">
                <div class="card">
                    <div class="header bg-red">
                        <h2 class="text-center">
                            {{ $category->name }}
                            {{-- <small>{{ $category->description }}</small> --}}
                        </h2>
                        {{-- <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="body">
                        Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                    </div>
                </div>
            </div>
        @endforeach
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
