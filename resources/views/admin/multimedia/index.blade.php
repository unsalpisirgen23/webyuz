@extends("admin.layouts.app")
@section("style")
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
@section("content")


    <div style="height: 600px;">
        <div id="fm"></div>
    </div>



@endsection
@section("script")
    <script src="{{ asset('vendor/file-manager/js/file-manager-js.js') }}"></script>
@endsection



