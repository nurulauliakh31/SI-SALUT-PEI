@extends('layouts.app-admin')

@section('title', 'Penilaian Alternatif | SI SALUT PEI')

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Penilaian Alternatif</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#" style="text-decoration: none">Penilaian Alternatif</a>
                </div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}"
                        style="text-decoration: none; color:rgba(0, 0, 0, 0.665)">Dashboard</a></div>
            </div>
        </div>
        <h2 class="section-title">Data Penilaian Alternatif</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Penilaian Alternatif ini akan digunakan untuk menentukan mahasiswa lulusan terbaik di PEI.
        </p>

        <form action="{{ route('penilaian-simpan') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title fw-bold text-dark my-2">Penilaian Alternatif Periode :</h5>
                    <select class="form-control col-md-6" name="periode">
                        <option value="">Pilih Periode</option>
                        <?php
                        for ($i = date('Y'); $i >= date('Y') - 12; $i -= 1) {
                            echo "<option value='$i' {{ $i == $i ? 'selected' : '' }}> $i </option>";
                        }
                        ?>
                    </select>
                    <button class="btn btn-primary me-md-2 p-2 ms-0" type="submit"><i class="fa fa-plus me-1"></i>&nbsp
                        Simpan</button>
                </div>

                {{-- <div class="container">
                    <button class="btn btn-sm btn-primary float-left me-5">Simpan</button>
                </div> --}}
                <div class="card-body">
                    <div class="text-dark dataTables_wrapper dt-bootstrap4" id="example1_wrapper">
                        <div class="table-responsive">
                            <table id="table_penilaian" class="table text-dark dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">
                                            #
                                        </th>
                                        <th>Nama Alternatif</th>
                                        <th>Prodi</th>
                                        {{-- <th>Prodi</th> --}}
                                        @foreach ($criteria as $key => $value)
                                            <th>{{ $value->nama_criteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mahasiswa as $alt => $valt)
                                    {{-- {{dd($mahasiswa)}} --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $valt->name }}</td>
                                            <td>{{ $valt->prodi->nama_prodi}}</td>
                                            {{-- <td>{{ $valt->prodi->nama_prodi }}</td> --}}
                                            @if (count($valt->penilaian) > 0)
                                                @foreach ($criteria as $key => $value)
                                                    <td>
                                                        <select name="crips_id[{{ $valt->id }}][]" class="form-control" style="width: 150px;">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}" {{ $v_1->id == $valt->penilaian[$key]->crips_id ? 'selected' : '' }}>
                                                                    {{ $v_1->nama_crips }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @else
                                                @foreach ($criteria as $key => $value)
                                                    <td>
                                                        <select name="crips_id[{{ $valt->id }}][]"
                                                            class="form-control">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}">
                                                                    {{ $v_1->nama_crips }}</option>
                                                            @endforeach
                                                        </select>
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
        </form>

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
