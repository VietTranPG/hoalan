@extends('admin.layouts.index')
@section('content')
<div class="wrapper">
    @include('admin.layouts.sidebar');
    <div class="main-panel">
        @include('admin.layouts.nav')
            <div class="content">
                <div class="container-fluid">
                    @yield('page')
                </div>
            </div>     
    </div>
</div>
@endsection