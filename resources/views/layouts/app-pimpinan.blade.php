<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>

    <link rel="shortcut icon" href="{{ asset('assets/img/logo-toga-putih2.png') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/stisla/css/components.css') }}">

    {{-- Bootstrap Modal --}}
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/stisla/library/chocolat/dist/css/chocolat.css') }}"> --}}

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- DataTables --}}
    {{-- <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet"> --}}

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/DataTables/Buttons-2.4.1/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/DataTables/Responsive-2.5.0/css/responsive.dataTables.min.css') }}">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <!-- Navbar -->
            @include('layouts.partials.dashboard-navbar')

            <!-- Sidebar -->
            @include('layouts.partials.sidebar-pimpinan')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('layouts.partials.dashboard-footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/stisla/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/stisla/library/prismjs/prism.js') }}"></script>
    {{-- <script src="{{ asset('assets/stisla/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/jquery-ui-dist/jquery-ui.min.css') }}"></script> --}}


    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('assets/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/stisla/js/custom.js') }}"></script>
    <script src="{{ asset('assets/stisla/js/page/bootstrap-modal.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/DataTables/DataTables-1.13.6/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Responsive-2.5.0/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Responsive-2.5.0/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.4.1/js/buttons.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.4.1/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.4.1/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.4.1/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/Buttons-2.4.1/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/JSZip-3.10.1/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>

    <!-- Bs custom file input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


    <script>
        $(document).ready(function() {

            // DataTables
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#table_ranking").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#ranking_wrapper .col-md-6:eq(0)');

            $("#table_criteria").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#table_penilaian").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#table_analisa").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#table_perhitungan").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });

            $(document).ready(function() {
                bsCustomFileInput.init();
            });
        });

    </script>

    @yield('script')
</body>


</html>
