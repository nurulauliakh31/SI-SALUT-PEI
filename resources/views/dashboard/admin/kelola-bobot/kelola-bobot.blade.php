@extends('layouts.app-admin')

@section('title', 'kelola-bobot')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">
@endpush

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Bobot</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Bobot</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Bobot</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Bobot ini untuk menentukan bobot dari setiap kriteria.
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark">Kelola Bobot</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-bobot-tambah"><i
                        class="fa fa-plus me-1"></i>&nbsp Tambah Bobot</button>
            </div>

            <!-- Modal Tambah Akun -->
            <form class="modal-part" id="modal-create-bobot" method="POST"
                action="{{ route('kelola-bobot-tambah') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_kriteria">Kriteria</label>
                        <select class="form-control" name="id_kriteria" required>
                            <option value="">Pilih Kriteria</option>
                            @foreach ($kriteria as $kriterias)
                                <option value="{{ $kriterias->id }}">{{ $kriterias->nama_kriteria }}</option>
                            @endforeach
                        </select>
                        @error('id_kriteria')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bobot">Bobot</label>
                        <input type="number" name="nilai_bobot" id="nilai_bobot"
                            class="form-control @error('nilai_bobot') is-invalid @enderror" value="{{ old('nilai_bobot') }}" min="1" max="5">
                        @error('nilai_bobot')
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
                                <th scope="col">Bobot</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bobot as $bobots)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $bobots->kriteria->nama_kriteria }}</td>
                                    <td>{{ $bobots->nilai_bobot }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            id="modal-bobot-edit{{ $bobots->id }}"
                                            onclick="editBobot({{ $bobots->id }})"><i
                                                class="fas fa-edit"></i></button>

                                        <!-- Modal Edit Akun -->
                                        <form class="modal-part" id="modal-edit-bobot{{ $bobots->id }}"
                                            method="POST" action="{{ route('kelola-bobot-edit', $bobots->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="id_kriteria">Kriteria</label>
                                                    <select class="form-control" name="id_kriteria" required>
                                                        <option value="">Pilih Kriteria</option>
                                                        @foreach ($kriteria as $kriterias)
                                                            <option value="{{ $kriterias->id }}">{{ $kriterias->nama_kriteria }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_kriteria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="bobot">Bobot</label>
                                                    <input type="number" name="nilai_bobot" id="nilai_bobot"
                                                        class="form-control @error('nilai_bobot') is-invalid @enderror" value="{{ $bobots->nilai_bobot }}" min="1" max="5">
                                                    @error('nilai_bobot')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>

                                        <form action="{{ route('kelola-bobot-hapus', $kriterias->id) }}" method="POST"
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
            {{ $bobot->links('vendor.pagination.custom') }}

            @if ($message = Session::get('success'))
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
