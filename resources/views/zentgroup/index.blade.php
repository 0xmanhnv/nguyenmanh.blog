@extends('zentgroup.layouts.master')

{{-- add script --}}
@section('css')
    <link href="{{ asset('blog_asset/css/style_custom.css') }}" rel="stylesheet" type="text/css"></link>
@endsection
{{-- end add script --}}

@section('content')
    
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
