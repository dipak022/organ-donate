<!doctype html>
<html class="no-js" lang="zxx">

<head>
  @include('frontend.layouts.head')
</head>

<body>

    <!-- header-start -->
    @include('frontend.layouts.header')
    <!-- header-end -->

    <!-- slider_area_start -->
    @include('frontend.layouts.slider')
    <!-- slider_area_end -->

    @yield('content')

    <!-- footer_start  -->
    @include('frontend.layouts.footer')
    <!-- footer_end  -->

    <!-- link that opens popup -->
    @include('frontend.layouts.script')
    
</body>

</html>