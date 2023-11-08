<!DOCTYPE html>

<head>
    @include('layouts.blocks.head')
</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header
    ============================================= -->
    @include('layouts.blocks.header')
    <!-- End Header -->

    <!-- Start Banner
    ============================================= -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    <!-- End Banner -->
    @yield('content')
    <!-- Start Google Maps
    ============================================= -->
    {{-- @include('layouts.blocks.map') --}}
    <!-- End Google Maps -->

    <!-- Star Footer
    ============================================= -->
    @include('layouts.blocks.footer')
    <!-- End Footer-->

    <!-- jQuery Frameworks
    ============================================= -->
    @include('layouts.blocks.foot')

</body>

<!-- Mirrored from validtemplates.github.io/clinicom/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Oct 2023 17:02:38 GMT -->

</html>
