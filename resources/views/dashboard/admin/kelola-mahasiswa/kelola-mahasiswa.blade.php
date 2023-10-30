@extends('layouts.app-admin')

@section('title', 'kelola-mahasiswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">
@endpush

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Mahasiswa</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Mahasiswa</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Mahasiswa yang sudah lulus di Politeknik Enjinering Indorama.
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark">Kelola Mahasiswa</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-mahasiswa-tambah"><i
                        class="fa fa-plus me-1"></i>&nbsp
                    Tambah Mahasiswa</button>
            </div>

            <!-- Modal Tambah Mahasiswa -->
            <form class="modal-part" id="modal-create-mahasiswa" method="POST"
                action="{{ route('kelola-mahasiswa-tambah') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nim">Nim</label>
                        <input type="number" name="nim" id="nim"
                            class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}">
                        @error('nama_prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nim">Nama</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            min="201904000">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_prodi">Prodi</label>
                        <select class="form-control" name="id_prodi" required>
                            <option value="">Pilih Prodi</option>
                            @foreach ($prodi as $prodis)
                                <option value="{{ $prodis->id }}">{{ $prodis->nama_prodi }}</option>
                            @endforeach
                        </select>
                        @error('id_prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="angkatan">Angkatan</label>
                        <select class="form-control" name="angkatan">
                            <option value="">Pilih Angkatan</option>
                            <?php
                            for ($i = date('Y'); $i >= date('Y') - 12; $i -= 1) {
                                echo "<option value='$i'> $i </option>";
                            }
                            ?>
                        </select>
                        @error('angkatan')
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
                                <th scope="col">Nim</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Angkatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $mahasiswas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswas->nim }}</td>
                                    <td>{{ $mahasiswas->name }}</td>
                                    <td>{{ $mahasiswas->prodi->nama_prodi }}</td>
                                    <td>{{ $mahasiswas->angkatan }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            id="modal-mahasiswa-edit{{ $mahasiswas->id }}"
                                            onclick="editMahasiswa({{ $mahasiswas->id }})"><i
                                                class="fas fa-edit"></i></button>

                                        <!-- Modal Edit Akun -->
                                        <form class="modal-part" id="modal-edit-mahasiswa{{ $mahasiswas->id }}"
                                            method="POST" action="{{ route('kelola-mahasiswa-edit', $mahasiswas->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nim">Nim</label>
                                                    <input type="number" name="nim" id="nim"
                                                        class="form-control @error('nim') is-invalid @enderror"
                                                        value="{{ $mahasiswas->nim }}">
                                                    @error('nim')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="name">Nama</label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ $mahasiswas->name }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_prodi">Prodi</label>
                                                    <select class="form-control" name="id_prodi" required>
                                                        <option value="" selected disabled>Pilih Prodi
                                                        </option>
                                                        @foreach ($prodi as $prodis)
                                                            <option value="{{ $prodis->id }}">{{ $prodis->nama_prodi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_prodi')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="angkatan">Angkatan</label>
                                                    <select class="form-control" name="angkatan" id="angkatan" required>
                                                        <option value="" selected disabled>Pilih Prodi
                                                        </option>

                                                        @php
                                                            $startYear = 2015; // Tahun awal
                                                            $endYear = now()->year; // Tahun sekarang
                                                        @endphp

                                                        @for ($year = $endYear; $year >= $startYear; $year--)
                                                            <option value="{{ $year }}">{{ $year }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('angkatan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>

                                        <form action="{{ route('kelola-mahasiswa-hapus', $mahasiswas->id) }}"
                                            method="POST" class="d-inline">
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
            {{ $mahasiswa->links('vendor.pagination.custom') }}

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
