@extends('layouts.app-admin')

@section('title', 'kelola-kriteria')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">
@endpush
@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Kriteria</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Kriteria</h2>
        <p class="section-lead d-flex justify-content-between">
            Data kriteria ini akan digunakan untuk menentukan mahasiswa lulusan terbaik di PEI.
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark">Kelola Kriteria</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-kriteria-tambah"><i
                        class="fa fa-plus me-1"></i>&nbsp Tambah Kriteria
                </button>
            </div>

            <!-- Modal Tambah Akun -->
            <form class="modal-part" id="modal-create-kriteria" method="POST"
                action="{{ route('kelola-kriteria-tambah') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_kriteria">Kriteria</label>
                        <input type="text" name="nama_kriteria" id="nama_kriteria"
                            class="form-control @error('nama_kriteria') is-invalid @enderror"
                            value="{{ old('nama_kriteria') }}">
                        @error('nama_kriteria')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status_kriteria">Status</label>
                        <select name="status_kriteria" id="status_kriteria" class="form-control @error('status_kriteria') is-invalid @enderror">
                            <option value="">Pilih Status</option>
                            <option value="max">Benefit</option>
                            <option value="min">Cost</option>
                        </select>
                        @error('status_kriteria')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-sm table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">
                                    #
                                </th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteria as $kriterias)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $kriterias->nama_kriteria }}</td>
                                    <td>{{ $kriterias->status_kriteria }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" id="modal-kriteria-edit{{ $kriterias->id }}" onclick="editKriteria({{ $kriterias->id }})"><i
                                                class="fas fa-edit"></i></button>

                                        <!-- Modal Edit Akun -->
                                        <form class="modal-part" id="modal-edit-kriteria{{ $kriterias->id }}"
                                            method="POST" action="{{ route('kelola-kriteria-edit', $kriterias->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nama_kriteria">Nim</label>
                                                    <input type="text" name="nama_kriteria" id="nama_kriteria"
                                                        class="form-control @error('nama_kriteria') is-invalid @enderror"
                                                        value="{{ $kriterias->nama_kriteria }}">
                                                    @error('nama_kriteria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="status_kriteria">Status</label>
                                                    <select name="status_kriteria" id="status_kriteria" class="form-control @error('status_kriteria') is-invalid @enderror">
                                                        <option value="">Pilih Status</option>
                                                        <option value="max">Benefit</option>
                                                        <option value="min">Cost</option>
                                                    </select>
                                                    @error('status_kriteria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>

                                        <form action="{{ route('kelola-kriteria-hapus', $kriterias->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            {{ $kriteria->links('vendor.pagination.custom') }}

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
