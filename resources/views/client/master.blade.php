<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from zcube.in/decare/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 04:03:39 GMT -->

<head>
    @include('client.blocks.head')
    @stack('css')
</head>

<body>
    <!-- header -->

    <!-- header-end -->
    <!-- main-area -->
    <div id='preloader' >
        <div class='loader' >
            <img src="{{ asset('clientstrator/img/loading.gif') }}" width="80">
        </div>
    </div><!-- Preloader -->
    <main>
        <section>
            @if (Session::has('success'))
                <p class="alert alert-info" style="margin-top: 100px">{{ Session::get('success') }}</p>
            @endif
            @yield('content')
        </section>
    </main>
    <!-- main-area-end -->
    <!-- footer -->
    <!-- footer-end -->
    
    <!-- JS here -->
    <!-- Mirrored from zcube.in/decare/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 04:05:56 GMT -->

    @include('client.blocks.foot')
</body>

<!-- Mirrored from zcube.in/decare/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 04:05:56 GMT -->
@stack('js')

@stack('jshand')
@stack('date')
@stack('name')

@stack('datejs')
</html>