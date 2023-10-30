@extends('layouts.app-admin')

@section('title', 'kelola-nilai-mahasiswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/stisla/library/prismjs/themes/prism.min.css') }}">
@endpush

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Nilai Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Nilai Mahasiswa</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Nilai Mahasiswa</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Nilai Mahasiswa ini sebagai penilaian dari alternatif.
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark">Kelola Nilai Mahasiswa</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-nilai-mahasiswa-tambah"><i
                        class="fa fa-plus me-1"></i>&nbsp Tambah Nilai</button>
            </div>

            <!-- Modal Tambah Akun -->
            {{-- <form class="modal-part" id="modal-create-nilai-mahasiswa" method="POST"
                action="{{ route('kelola-nilai-mahasiswa-tambah') }}" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="form-group">
                        <label for="id_mahasiswa">Mahasiswa</label>
                        <select class="form-control" name="id_mahasiswa" required>
                            <option value="">Pilih Mahasiswa</option>
                            @foreach ($mahasiswa as $mahasiswas)
                                <option value="{{ $mahasiswas->id }}">{{ $mahasiswas->nim }}</option>
                            @endforeach
                        </select>
                        @error('id_mahasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @foreach ($kriteria as $cr)
                            <label for="kriteria" name="id_kriteria">{{ $cr->nama_kriteria }}: </label>
                            <input class="form-control" type="number" name="nilai_mahasiswa[{{ $cr->id }}]" required>
                        @endforeach
                        @error('nilai_mahasiswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </form> --}}

            <form class="modal-part" id="modal-create-nilai-mahasiswa" method="POST"
                action="{{ route('kelola-nilai-mahasiswa-tambah') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_mahasiswa">Mahasiswa</label>
                    <select class="form-control" name="id_mahasiswa" id="id_mahasiswa" required>
                        <option value="">Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $mahasiswas)
                            <option value="{{ $mahasiswas->id }}">{{ $mahasiswas->nim }} - {{ $mahasiswas->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_mahasiswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_kriteria">Kriteria</label>
                    <select class="form-control" name="id_kriteria" id="id_kriteria" required>
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
                <div class="form-group">
                    <label for="nilai_mahasiswa">Bobot</label>
                    <input type="number" name="nilai_mahasiswa" id="nilai_mahasiswa"
                        class="form-control @error('nilai_mahasiswa') is-invalid @enderror" min="1" max="5">
                    @error('nilai_mahasiswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-sm table-md table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle" rowspan="2">#</th>
                                <th class="text-center align-middle" rowspan="2">Alternative's Name</th>
                                <th class="text-center" colspan="{{ $kriteria->count() }}">Criterias</th>
                                <th class="text-center align-middle" rowspan="2">Action</th>
                                {{-- <th class="text-center" scope="col">
                                    #
                                </th>
                                <th scope="col">Nim Mahasiswa</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Action</th> --}}
                            </tr>
                            <tr>
                                @if ($kriteria->count())
                                    @foreach ($kriteria as $criteria)
                                        <th class="text-center">{{ $criteria->nama_kriteria }} ( {{ $criteria->status_kriteria }} )</th>
                                    @endforeach
                                @else
                                    <th class="text-center">No Criteria Data Found</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if ($nilai->count())
                                @foreach ($nilai as $nilais)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $nilais->mahasiswa->nim }}</td>
                                        <td>{{ $nilais->kriteria->nama_kriteria }}</td>
                                        <td>{{ $nilais->nilai_mahasiswa }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                id="modal-nilai-mahasiswa-edit{{ $nilais->id }}"
                                                onclick="editNilaiMahasiswa({{ $nilais->id }})"><i
                                                    class="fas fa-edit"></i></button>

                                            <!-- Modal Edit Akun -->
                                            <form class="modal-part" id="modal-edit-nilai-mahasiswa{{ $nilais->id }}"
                                                method="POST"
                                                action="{{ route('kelola-nilai-mahasiswa-edit', $nilais->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="id_mahasiswa">Mahasiswa</label>
                                                    <select class="form-control" name="id_mahasiswa" required>
                                                        <option value="">Pilih Nim Mahasiswa</option>
                                                        @foreach ($mahasiswa as $mahasiswas)
                                                            <option value="{{ $mahasiswas->id }}">{{ $mahasiswas->nim }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_mahasiswa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_kriteria">Kriteria</label>
                                                    <select class="form-control" name="id_kriteria" required>
                                                        <option value="">Pilih Kriteria</option>
                                                        @foreach ($kriteria as $kriterias)
                                                            <option value="{{ $kriterias->id }}">
                                                                {{ $kriterias->nama_kriteria }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_kriteria')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nilai_mahasiswa">Nilai Mahasiswa</label>
                                                    <input type="number" name="nilai_mahasiswa" id="nilai_mahasiswa"
                                                        class="form-control @error('nilai_mahasiswa') is-invalid @enderror"
                                                        value="{{ $nilais->nilai_mahasiswa }}" min="1"
                                                        max="5">
                                                    @error('nilai_bobot')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </form>

                                            <form action="{{ route('kelola-nilai-mahasiswa-hapus', $nilais->id) }}"
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
                            @endif --}}

                            {{-- @if ($mahasiswa->count())
                                @foreach ($mahasiswa as $alternative)
                                    <tr>
                                        <th scope="row" class="text-center">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="text-center">
                                            {{ $alternative->nim }}
                                        </td>
                                        @foreach ($kriteria as $key => $value)
                                            @if (isset($alternative->alternatives[$key]))
                                                <td class="text-center">
                                                    {{ floatval($alternative->alternatives[$key]->nilai_mahasiswa) }}
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    Empty
                                                </td>
                                            @endif
                                        @endforeach

                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm" id="#" onclick="#"><i
                                                    class="fas fa-edit"></i></button>

                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="{{ 3 + $criterias->count() }}" class="text-center text-danger">
                                        No Data
                                    </td>
                                </tr>
                            @endif --}}

                            @foreach ($nilai as $i => $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item[0]['name'] }} ({{ $item[0]['nim'] }})</td>
                                    @foreach ($kriteria as $j => $row)
                                        <td class="text-center">
                                            @if (isset($item[$j]))
                                                <span>{{ $item[$j]['nilai_mahasiswa'] }}</span>
                                            @else
                                                <span>empty</span>
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm"
                                            id="modal-nilai-mahasiswa-edit{{ $item[0]['nim'] }}"
                                            onclick="editNilaiMahasiswa({{ $item[0]['nim'] }})"><i
                                                class="fas fa-edit"></i></button>

                                        <!-- Modal Edit Akun -->
                                        {{-- <form class="modal-part" id="modal-edit-nilai-mahasiswa{{ $item[0]['nim'] }}"
                                        method="POST" action="{{ route('kelola-nilai-mahasiswa-edit', $item[0]['nim'] )}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form">
                                                <div class="form-group">
                                                    <label for="id_mahasiswa">Mahasiswa</label>
                                                    <input type="text" name="id_mahasiswa" id="id_mahasiswa"
                                                        class="form-control @error('nim') is-invalid @enderror"
                                                        value="{{ $item[0]['nim'] }}">
                                                    @error('id_mahasiswa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="id_kriteria">Kriteria</label>
                                                    <select class="form-control" name="id_kriteria" id="id_kriteria" required>
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
                                                <div class="form-group">
                                                    <label for="nilai_mahasiswa">Bobot</label>
                                                    <input type="number" name="nilai_mahasiswa" id="nilai_mahasiswa"
                                                        class="form-control @error('nilai_mahasiswa') is-invalid @enderror"
                                                        value="{{ old('nilai_mahasiswa') }}" min="0" max="5">
                                                    @error('nilai_mahasiswa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form> --}}

                                        <form class="modal-part" id="modal-edit-nilai-mahasiswa{{ $item[0]['nim'] }}"
                                            method="POST"
                                            action="{{ route('kelola-nilai-mahasiswa-edit', $item[0]['nim']) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form ">
                                                <div class="form-group">
                                                    <label for="id_mahasiswa">Mahasiswa</label>
                                                    <input type="text" name="id_mahasiswa" id="id_mahasiswa"
                                                        class="form-control @error('nim') is-invalid @enderror"
                                                        value="{{ $item[0]['nim'] }}">
                                                    @error('id_mahasiswa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    @for ($i = 0; $i < count($item); $i++)
                                                        @foreach ($kriteria as $j => $row)
                                                            @if ($loop->iteration - 1 == $i)
                                                                <label for="kriteria"
                                                                    name="id_kriteria">{{ $row->nama_kriteria }}:
                                                                </label>
                                                                <input class="form-control" type="number"
                                                                    name="nilai_mahasiswa{{ $i }}"
                                                                    value="{{ $item[$i]['nilai_mahasiswa'] }}"required>
                                                            @endif
                                                        @endforeach
                                                    @endfor
                                                    @error('nilai_mahasiswa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </form>

                                        <form action="{{ route('kelola-nilai-mahasiswa-hapus', $item[0]['nim']) }}"
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

            {{-- {!! $nilai->appends(\Request::except('kelola-nilai-mahasiswa'))->render() !!} --}}
            <!-- Pagination -->
            {{ $query->links('vendor.pagination.custom') }}

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
