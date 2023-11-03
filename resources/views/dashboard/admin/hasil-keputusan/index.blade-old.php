@extends('layouts.app-admin')

@section('title', 'Hasil Keputusan | SI SALUT PEI')

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Hasil Keputusan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#" style="text-decoration: none">Hasil Keputusan</a>
                </div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}"
                        style="text-decoration: none; color:rgba(0, 0, 0, 0.665)">Dashboard</a></div>
            </div>
        </div>
        <h2 class="section-title">Data Hasil Keputusan Mahasiswa Lulusan Terbaik</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Hasil Keputusan ini akan menghasilkan rekomendasi dari mahasiswa lulusan terbaik di PEI. Data ini juga dapat digunakan sebagai laporan.
        </p>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark my-2">Hasil Keputusan</h5>
                <button class="btn btn-danger me-md-2 p-2 ms-0" type="submit"><i class="fa fa-trash me-1"></i>&nbsp
                    Kosongkan Tabel</button>
            </div>
            {{-- <div class="container">
                <button class="btn btn-sm btn-primary float-left me-5">Simpan</button>
            </div> --}}
            <div class="card-body">
                <div class="text-dark dataTables_wrapper dt-bootstrap4" id="example1_wrapper">
                    <div class="text-dark dataTables_wrapper dt-bootstrap4">
                        <div class="table-responsive">
                            <table id="table_ranking" class="table text-dark table-bordered dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">
                                            #
                                        </th>
                                        {{-- <th scope="col">Kode</th> --}}
                                        <th scope="col">Periode</th>
                                        <th scope="col">Nama Lulusan</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Hasil</th>
                                        <th scope="col">Rank</th>
                                        {{-- <th scope="col">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penilaian as $nilai => $vnilai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $vnilai->periode }}</td>
                                        <td>{{ $vnilai->mahasiswa->name}}</td>
                                        <td>{{ $vnilai->mahasiswa->prodi->nama_prodi}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


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
    {{-- <script src="{{ asset('js/sweetalert.js') }}"></script>
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
    </script> --}}
@endpush
