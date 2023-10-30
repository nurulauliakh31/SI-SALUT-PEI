@extends('layouts.app-admin')

@section('title', 'kelola-nilai-mahasiswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">
@endpush

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Nilai Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Nilai Mahasiswa</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Nilai Mahasiswa</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Nilai Mahasiswa ini sebagai penilaian dari alternatif.
        </p>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-sm table-md table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2">#</th>
                                <th class="text-center align-middle" rowspan="2">Alternative's Name</th>
                                <th class="text-center" colspan="{{ $kriteria->count() }}">Criterias</th>
                            </tr>
                            <tr>
                                @if ($kriteria->count())
                                    @foreach ($kriteria as $criteria)
                                        <th class="text-center">{{ $criteria->nama_kriteria }}
                                            {{ $criteria->status_kriteria }}</th>
                                    @endforeach
                                @else
                                    <th class="text-center">No Criteria Data Found</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $i => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item[0]['name'] }} ({{ $item[0]['nim'] }})</td>

                                        @foreach ($normalizedMatrix as $row)
                                            @foreach ($row['normalized_values'] as $normalizedValue)
                                                <td class="text-center">{{ round($normalizedValue, 2) }}</td>
                                            @endforeach
                                        @endforeach
                                    dd({{ round($normalizedValue, 2) }});
                                </tr>
                            @endforeach
                            {{-- @foreach ($normalizedMatrix as $row)
                                <tr class='center'>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    @foreach ($nilai as $i => $item)
                                    <td>{{ $item[0]['name'] }} ({{ $item[0]['nim'] }})</td>
                                    @endforeach
                                    @foreach ($row['normalized_values'] as $normalizedValue)
                                        <td class="text-center">{{ round($normalizedValue, 2) }}</td>
                                        <td class="text-center">
                                            <span>{{ round($normalizedValue, 2) }}</span>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- {!! $nilai->appends(\Request::except('kelola-nilai-mahasiswa'))->render() !!} --}}
            <!-- Pagination -->
            {{ $query->links('vendor.pagination.custom') }}

            @if ($message = Session::get('success'))
                <script>
                    swal("{{ $message }}", "{{ Session::get('message') }}", {
                        button: true,
                        button: "OK ",
                        icon: 'success',
                        dangerMode: true,
                    })
                </script>
            @endif
        </div>
    </section>


@endsection

@push('scripts')
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/stisla/js/page/bootstrap-modal.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('assets/stisla/library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/stisla/js/page/modules-sweetalert.js') }}"></script>
@endpush
