@extends('layouts.app-admin')

@section('title', 'kelola-prodi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">
@endpush

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Prodi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Prodi</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Prodi</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Prodi yang terdapat di Politeknik Enjinering Indorama
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark my-2">Kelola Prodi</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-prodi-tambah"><i class="fa fa-plus me-1"></i>&nbsp
                    Tambah Prodi</button>
            </div>
            <!-- Modal Tambah Akun -->
            <form class="modal-part" id="modal-create-prodi" method="POST" action="{{ route('kelola-prodi-tambah') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="nama_prodi">Nama</label>
                    <input type="text" name="nama_prodi" id="nama_prodi"
                        class="form-control @error('nama_prodi') is-invalid @enderror" value="{{ old('nama_prodi') }}">
                    @error('nama_prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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
                                <th scope="col">Nama Program Studi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodis as $prodi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $prodi->nama_prodi }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" id="modal-prodi-edit{{ $prodi->id }}" onclick="editProdi({{ $prodi->id }})"><i class="fas fa-edit"></i></button>

                                        <!-- Modal Edit Akun -->
                                        <form class="modal-part" id="modal-edit-prodi{{ $prodi->id }}" method="POST"
                                            action="{{ route('kelola-prodi-edit', $prodi->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-2">
                                                <label for="nama_prodi">Nama</label>
                                                <input type="text" name="nama_prodi" id="nama_prodi"
                                                    class="form-control @error('nama_prodi') is-invalid @enderror"
                                                    value="{{ $prodi->nama_prodi }}">
                                                @error('nama_prodi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </form>

                                        <form action="{{ route('kelola-prodi-hapus', $prodi->id) }}" method="POST"
                                            class="d-inline">
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
            {{ $prodis->links('vendor.pagination.custom') }}

            @if ($message = Session::get('success'))
                {{-- <div class="alert alert-nosuccess">
                <p>{{ $message }}</p>
            </div> --}}
                <script>
                    swal("{{$message}}", "{{ Session::get('message') }}", {
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
