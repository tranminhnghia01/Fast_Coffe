
@php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
@endphp
@include('frontend.layouts.header')

@if (strpos($url, "shop/book") == true)
    @include('frontend.layouts.blocks.navbook')
@else
@include('frontend.layouts.blocks.navigation')
 @endif

@if (strpos($url, "Shop") == false)
    @include('frontend.layouts.blocks.slider')
@endif

@yield('content')


@include('frontend.layouts.blocks.call-to-action')

@include('frontend.layouts.blocks.instagram-feed')

@include('frontend.layouts.blocks.footer')
@include('frontend.layouts.footer')
