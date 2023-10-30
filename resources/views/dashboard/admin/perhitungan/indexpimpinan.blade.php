@extends('layouts.app-pimpinan')

@section('title', 'Metode SAW | SI SALUT PEI')

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Perhitungan SAW</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#" style="text-decoration: none">Perhitungan</a>
                </div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}"
                        style="text-decoration: none; color:rgba(0, 0, 0, 0.665)">Dashboard</a></div>
            </div>
        </div>
        <h2 class="section-title">Metode SAW</h2>
        <p class="section-lead d-flex justify-content-between">
            Metode SAW terbagi menjadi 3 langkah.
        </p>

        <div class="card p-2">
            <div id="accordion">
                <div class="accordion">
                    <div class="accordion-header p-3" role="button" data-toggle="collapse" data-target="#acc_analisa"
                        aria-expanded="true">
                        <h4>1. Tahap Analisa</h4>
                    </div>
                    <div class="accordion-body collapse" id="acc_analisa" data-parent="#accordion">
                        <div class="card-body">
                            <div class="text-dark dataTables_wrapper dt-bootstrap4" id="example1_wrapper">
                                <div class="table-responsive">
                                    <table
                                        class="table text-dark table-bordered dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Alternatif</th>
                                                @foreach ($criteria as $key => $value)
                                                    <th>{{ $value->nama_criteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($mahasiswa as $alt => $valt)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $valt->name }}</td>
                                                    @if (count($valt->penilaian) > 0)
                                                        @foreach ($valt->penilaian as $key => $value)
                                                            <td class="text-center">
                                                                {{ $value->crips->bobot }}
                                                            </td>
                                                        @endforeach
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>Tidak ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-2">
            <div id="accordion">
                <div class="accordion">
                    <div class="accordion-header p-3" role="button" data-toggle="collapse" data-target="#acc_normalisasi"
                        aria-expanded="true">
                        <h4>2. Tahap Normalisasi</h4>
                    </div>
                    <div class="accordion-body collapse" id="acc_normalisasi" data-parent="#accordion">
                        <div class="card-body">
                            <div class="text-dark dataTables_wrapper dt-bootstrap4" id="example1_wrapper">
                                <div class="table-responsive">
                                    <table id="table_perhitungan"
                                        class="table text-dark table-bordered dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Alternatif / Kriteria</th>
                                                @foreach ($criteria as $key => $value)
                                                    <th>{{ $value->nama_criteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($normalisasi as $key => $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $key }}</td>
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <td>
                                                            {{-- {{dd($value)}} --}}
                                                            {{ $value_1 }}
                                                            {{-- @if ($value[count($value) - 1] != $key_1)
                                                                {{ $value_1 }}
                                                            @endif --}}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-2">
            <div id="accordion">
                <div class="accordion">
                    <div class="accordion-header p-3" role="button" data-toggle="collapse" data-target="#acc_ranking"
                        aria-expanded="true">
                        <h4>3. Tahap Perangkingan</h4>
                    </div>
                    <div class="accordion-body collapse" id="acc_ranking" data-parent="#accordion">
                        <div class="card-body">
                            <div class="text-dark dataTables_wrapper dt-bootstrap4" id="ranking_wrapper">
                                <div class="table-responsive">
                                    <table id="table_ranking" class="table text-dark table-bordered dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                @foreach ($criteria as $key => $value)
                                                    <th>{{ $value->nama_criteria }}</th>
                                                @endforeach
                                                <th rowspan="2" style="text-align:center;padding-bottom: 40px;">Total
                                                </th>
                                                <th rowspan="2" style="text-align:center;padding-bottom: 40px;">Rank</th>
                                            </tr>
                                            <tr>
                                                <th>Bobot</th>
                                                @foreach ($criteria as $key => $value)
                                                    <th>{{ $value->bobot_criteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $maxValue = collect($ranking)
                                                    ->flatten()
                                                    ->max();
                                                $data= [];
                                            @endphp

                                            @foreach ($ranking as $key => $value)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    @foreach ($value as $key => $value_1)
                                                        <td>{{ number_format($value_1, 2) }}</td>

                                                    @endforeach
                                                    <td>{{ $loop->index + 1 }}</td>
                                                </tr>
                                                @php
                                                $data[]=end($value);
                                                @endphp
                                            @endforeach
                                            <div class="alert alert-success mt-3" role="alert">
                                                {{-- {{dd($data)}} --}}
                                                Rekomendasi mahasiswa lulusan terbaik di PEI dengan nilai V = {{$data[0]}}.

                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
        $('.hapus').click(function() {
            swal({
                    title: "Apa Kamu Yakin?",
                    text: "Sekali kamu hapus, data tidak dapat dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'DELETE',
                            data: {
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function() {
                                swal("Data berhasil dihapus!", {
                                    icon: "success",
                                }).then((willDelete) => {
                                    window.location = "{{ route('kriteria.index') }}"
                                });
                            }
                        })
                    } else {
                        swal("Data aman!");
                    }
                });

            return false;
        });
    </script>
@endpush
