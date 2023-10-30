@extends('layouts.app-admin')

@section('title', 'kelola-kriteria | SI SALUT PEI')

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#" style="text-decoration: none">Kelola Kriteria</a></div>
                <div class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}"
                        style="text-decoration: none; color:rgba(0, 0, 0, 0.665)">Dashboard</a></div>
            </div>
        </div>
        <h2 class="section-title">Data Kriteria</h2>
        <p class="section-lead d-flex justify-content-between">
            Data kriteria ini akan digunakan untuk menentukan mahasiswa lulusan terbaik di PEI.
            Total Bobot : {{$criteria->sum('bobot_criteria')}}.
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark my-2">Kelola Kriteria</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-criteria-tambah"><i
                        class="fa fa-plus me-1"></i>&nbsp
                    Tambah Kriteria</button>
            </div>
            <!-- Modal Tambah Akun -->
            <form action="{{ route('kriteria.store') }}" method="POST" enctype="multipart/form-data" class="modal-part"
                id="modal-create-criteria">
                @csrf
                <div class="grup-modal-body">
                    <div class="container">
                        <div class="form-group mb-2 me-5">
                            <label for="nama_criteria">Nama Kriteria</label>
                            <input type="text" name="nama_criteria" id="nama_criteria"
                                class="form-control @error('nama_criteria') is-invalid @enderror"
                                value="{{ old('nama_criteria') }}">
                            @error('nama_criteria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="attribut">Attribut</label>
                            <select name="attribut" id="attribut"
                                class="form-control @error('attribut') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                            @error('attribut')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobot_criteria">Bobot Kriteria</label>
                            <input type="text" min="0" max="100" class="form-control @error('bobot_criteria') is-invalid @enderror" name="bobot_criteria" placeholder="0-1">
                            @error('bobot_criteria')
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
                        <table id="table_criteria" class="table table-bordered table-hover table-striped text-dark dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">
                                        #
                                    </th>
                                    <th scope="col">Kriteria</th>
                                    <th scope="col">Attribut</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($criteria as $c)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $c->nama_criteria }}</td>
                                        <td>{{ $c->attribut }}</td>
                                        <td>{{ $c->bobot_criteria }}</td>
                                        <td>
                                            <a href="{{ route('kriteria.show', $c->id) }}" class="btn btn-sm btn-circle btn-warning"><i class="fa fa-eye"></i></a>
                                            {{-- <a href="#" class="btn btn-sm btn-circle btn-primary"><i class="fa fa-edit"></i></a> --}}
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#updateCriteria{{ $c->id }}"><i
                                                    class="fas fa-edit"></i></button>

                                            {{-- Modal Edit Kriteria --}}
                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="updateCriteria{{ $c->id }}" data-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('kriteria.update', $c->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Kriteria</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="grup-modal-body">
                                                                    <div class="container">
                                                                        <div class="form-group">
                                                                            <label for="nama">Nama Kriteria</label>
                                                                            <input type="text" class="form-control @error('nama_criteria') is-invalid @enderror"
                                                                                name="nama_criteria" value="{{ $c->nama_criteria }}">
                                                                            @error('nama_criteria')
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="attribut">Attribut Kriteria</label>
                                                                            <select name="attribut" id="" class="form-control" required>
                                                                                <option {{ $c->attribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                                                                <option {{ $c->attribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                                                                            </select>
                                                                            @error('attribut')
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot_criteria">Bobot Kriteria</label>
                                                                            <input type="text" min="0" max="100" class="form-control @error('bobot_criteria') is-invalid @enderror" name="bobot_criteria" value="{{ $c->bobot_criteria }}" placeholder="0-1">
                                                                            @error('bobot_criteria')
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        {{-- <div class="form-group">
                                                                            <label for="bobot_criteria">Bobot Kriteria</label>
                                                                            <input type="number" min="0" max="100" class="form-control @error('bobot_criteria') is-invalid @enderror"
                                                                                name="bobot_criteria" value="{{ $c->bobot_criteria }}" placeholder="0-1">
                                                                            @error('bobot_criteria')
                                                                                <div class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer bg-whitesmoke br">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ route('kriteria.destroy', $c->id) }}" class="btn btn-sm btn-circle btn-danger hapus"><i class="fa fa-trash"></i></a>
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
