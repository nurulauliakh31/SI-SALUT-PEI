<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI SALUT PEI</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-toga-putih2.png') }}" type="image/x-icon">

    {{-- <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Template Dijimedia --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/digimedia/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/digimedia/css/templatemo-digimedia-v3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/digimedia/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/digimedia/css/owl.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-table-headers/0.1.22/jquery.stickytableheaders.min.js"></script>

</head>

<body>
    <div id="app">
        @include('layouts.partials.navbar')

        <main>
            @yield('content')
        </main>
    </div>

    {{-- Script --}}
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    {{-- Jquery JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Owl carousel JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Fontawesome JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"
        integrity="sha512-LW9+kKj/cBGHqnI4ok24dUWNR/e8sUD8RLzak1mNw5Ja2JYCmTXJTF5VpgFSw+VoBfpMvPScCo2DnKTIUjrzYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- OrgChart JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/js/jquery.orgchart.min.js"
        integrity="sha512-alnBKIRc2t6LkXj07dy2CLCByKoMYf2eQ5hLpDmjoqO44d3JF8LSM4PptrgvohTQT0LzKdRasI/wgLN0ONNgmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Custom JS --}}
    {{-- <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    <script src="{{ asset('assets/stisla/js/scripts.js') }}"></script>
    {{-- End Script --}}

    <!-- Scripts -->
    <script src="{{ asset('assets/digimedia/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/digimedia/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/digimedia/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/digimedia/js/animation.js') }}"></script>
    <script src="{{ asset('assets/digimedia/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/digimedia/js/custom.js') }}"></script>
</body>

</html>
