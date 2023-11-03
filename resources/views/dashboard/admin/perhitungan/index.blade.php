@extends('layouts.app-admin')

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
                        aria-expanded="false">
                        <h4>1. Tahap Analisa</h4>
                    </div>
                    <div class="accordion-body collapse" id="acc_analisa" data-parent="#accordion">
                        <div class="card-body">
                            <div class="text-dark dataTables_wrapper dt-bootstrap4">
                                <div class="table-responsive">
                                    <table class="table text-dark table-bordered dataTable dtr-inline">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Alternatif</th>
                                                {{-- <th>Prodi</th> --}}
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
                                                    {{-- <td>{{ $valt->prodi->nama_prodi}}</td> --}}
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
                        aria-expanded="false">
                        <h4>2. Tahap Normalisasi</h4>
                    </div>
                    <div class="accordion-body collapse" id="acc_normalisasi" data-parent="#accordion">
                        <div class="card-body">
                            <div class="text-dark dataTables_wrapper dt-bootstrap4">
                                <div class="table-responsive">
                                    <table class="table text-dark table-bordered dataTable dtr-inline">
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
                                                {{-- {{dd($normalisasi)}} --}}
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $key }}</td>
                                                    {{-- <td>{{ $value['prodi']['nama_prodi']}}</td> --}}
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

        <form action="#" method="">
            @csrf
            <div class="card p-2">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header p-3" role="button" data-toggle="collapse" data-target="#acc_ranking"
                            aria-expanded="false">
                            <h4>3. Tahap Perangkingan</h4>
                        </div>
                        <div class="accordion-body collapse" id="acc_ranking" data-parent="#accordion">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Input Hasil
                                </button>

                                <div class="text-dark dataTables_wrapper dt-bootstrap4">
                                    <div class="table-responsive">
                                        <table id="table_ranking"
                                            class="table text-dark table-bordered dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    @foreach ($criteria as $key => $value)
                                                        <th>{{ $value->nama_criteria }}</th>
                                                    @endforeach
                                                    <th rowspan="2" style="text-align:center;padding-bottom: 40px;">Total
                                                    </th>
                                                    <th rowspan="2" style="text-align:center;padding-bottom: 40px;">Rank
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Bobot</th>
                                                    @foreach ($criteria as $key => $value)
                                                        <th>{{ $value->bobot_criteria }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ranking as $rank => $value)
                                                    <tr>
                                                        <td>{{ $rank }}</td>
                                                        {{-- {{dd($ranking)}} --}}
                                                        @foreach ($value as $key_1 => $value_1)
                                                            <td>{{ number_format($value_1, 2) }}</td>
                                                            {{-- {{dd($key)}} --}}
                                                        @endforeach
                                                        <td>{{ $loop->index + 1 }}</td>
                                                    </tr>

                                                    {{-- {{dd($ranking)}} --}}
                                                    @php
                                                        $data[] = end($value);
                                                        $lulusan[] = $rank;
                                                    @endphp
                                                @endforeach
                                                <div class="alert alert-dark mt-3" role="alert">
                                                    {{-- {{dd($lulusan)}} --}}
                                                    Rekomendasi mahasiswa lulusan terbaik di PEI adalah <b>
                                                        {{ $lulusan[0] }} </b> dengan nilai V = {{ $data[0] }}.
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
        </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Hasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formHasil">
                            @csrf
                            <div class="form-group">
                                <label for="siswa">Nama Mahasiswa</label>
                                <select name="siswa" id="siswa" class="form-control">
                                    <option value="">Pilih Mahasiswa</option>
                                    @foreach ($siswa as $s => $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hasil">Hasil</label>
                                <input type="number" class="form-control" id="hasil" name="hasil">
                            </div>
                            <div class="form-group">
                                <label for="rangking">Rangking</label>
                                <input type="number" class="form-control" id="rangking" name="rangking">
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <input type="number" class="form-control" id="periode" name="periode">
                            </div>
                            <button type="button" class="btn btn-primary" id="btn-hasil">Submit</button>
                        </form>
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

        $('#btn-hasil').on('click', function(e) {
            e.preventDefault()
            let siswa = $('#siswa').val()
            let hasil = $('#hasil').val()
            let rangking = $('#rangking').val()

            if (siswa == '' || hasil == '' || rangking == '') return alert(
                'Data siswa, hasil dan ranking harus diisi.');

            $.ajax({
                type: 'post',
                url: '{{ url('hasil-ranking') }}',
                data: $('#formHasil').serialize(),
                success: (res) => {
                    console.log(res)
                    $('#formHasil').trigger('reset')
                    $('#exampleModal').modal('hide')
                    alert('Data berhasil ditambahkan.')
                },
                error: (xhr, status, pesan) => {
                    console.log(xhr)
                }
            })
        })
    </script>
@endpush
