@extends('layouts.app-admin')

@section('title', 'Dashboard Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header my-3">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{$totalAdmin}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Prodi</h4>
                        </div>
                        <div class="card-body">
                            {{$totalProdi}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            {{$totalMahasiswa}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kriteria</h4>
                        </div>
                        <div class="card-body">
                            {{$totalKriteria}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/stisla/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/stisla/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/stisla/js/page/index-0.js') }}"></script> --}}
@endpush
