@extends('layouts.app-admin')

@section('title', 'kelola-Crips | SI SALUT PEI')

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Crips</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#" style="text-decoration: none">Kelola Crips</a></div>
                <div class="breadcrumb-item"><a href="{{ route('kriteria.index') }}" style="text-decoration: none; color:rgba(0, 0, 0, 0.665)">Kriteria</a></div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}" style="text-decoration: none; color:rgba(0, 0, 0, 0.665)">Dashboard</a></div>
            </div>
        </div>
        <h2 class="section-title">Data Crips (Coefficient of Ratio to Ideal Positive Solution)</h2>
        <p class="section-lead d-flex justify-content-between">
            Data crips ini akan digunakan untuk memberikan bobot pada setiap kriteria dan menghitung nilai skor untuk setiap alternatif berdasarkan bobot kriteria.
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark my-2">Kelola Crips</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-criteria-tampil"><i
                        class="fa fa-plus me-1"></i>&nbsp Tambah Crips</button>
            </div>

            <!-- Modal Tambah Akun -->
            <form action="{{ route('crips.store') }}" method="POST" enctype="multipart/form-data" class="modal-part"
                id="modal-show-criteria">
                @csrf
                <div class="grup-modal-body">
                    <div class="container">
                        <input type="hidden" value="{{ $criteria->id }}" name="kriteria_id">
                        <div class="form-group">
                            <label for="nama">Nama Crips</label>
                            <input type="text" class="form-control @error('nama_crips') is-invalid @enderror"
                                name="nama_crips" value="{{ old('nama_crips') }}">
                            @error('nama_crips')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot Crips</label>
                            <input type="text" class="form-control @error('bobot') is-invalid @enderror" name="bobot"
                                value="{{ old('bobot') }}">
                            @error('bobot')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

            </form>

            <div class="card-body">
                <div class="text-dark dataTables_wrapper dt-bootstrap4" id="example1_wrapper">
                    <div class="table-responsive">
                        <table id="table_criteria"
                            class="table table-bordered table-hover table-striped text-dark dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">
                                        #
                                    </th>
                                    <th scope="col">Nama Crips</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($crips as $cr)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $cr->nama_crips }}</td>
                                        <td>{{ $cr->bobot }}</td>
                                        <td>
                                            {{-- <a href="#" class="btn btn-sm btn-circle btn-primary"><i class="fa fa-edit"></i></a> --}}
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#updateCrips{{ $cr->id }}"><i
                                                    class="fas fa-edit"></i></button>

                                            {{-- Modal Edit Kriteria --}}
                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="updateCrips{{ $cr->id }}" data-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('crips.update', $cr->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Crips</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="grup-modal-body">
                                                                    <div class="container">
                                                                        <div class="form-group">
                                                                            <label for="nama">Nama Crips</label>
                                                                            <input type="text" class="form-control @error('nama_crips') is-invalid @enderror"
                                                                                name="nama_crips" value="{{ $cr->nama_crips }}">
                                                                            @error('nama_crips')
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot">Bobot Crips</label>
                                                                            <input type="text" class="form-control @error('bobot') is-invalid @enderror"
                                                                                name="bobot" value="{{ $cr->bobot }}">
                                                                            @error('bobot')
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer bg-whitesmoke br">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ route('crips.destroy', $cr->id) }}" class="btn btn-sm btn-circle btn-danger hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
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
    </section>
@endsection

@push('scripts')
    {{-- sweetaler2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.delete').click(function() {
            var dataid = $(this).attr('data-id');
            Swal.fire({
                title: 'Yakin?',
                text: "Anda akan menghapus data dengan User : " + dataid + " ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/akun.destroy/" + dataid + ""
                    Swal.fire(
                        'Deleted!',
                        'Data berhasil di hapus.',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Cancelled',
                        'Data Anda Aman :)',
                        'error'
                    )
                }
            });
        });
    </script> --}}

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
                                    window.location = "{{ route('kriteria.show', $criteria->id) }}"
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
