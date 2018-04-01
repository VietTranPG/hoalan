@extends('index') @section('content')
<div class="wrapper">
    @include('client.layouts.sidebar');
    <div class="main-panel">
        @include('client.layouts.nav')
        <div class="content">
            <div class="container-fluid">
                @yield('page')
            </div>
        </div>
    </div>
</div>
@endsection