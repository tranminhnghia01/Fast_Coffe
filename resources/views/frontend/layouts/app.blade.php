
@php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
@endphp
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')
