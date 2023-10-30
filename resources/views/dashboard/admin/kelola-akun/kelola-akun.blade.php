@extends('layouts.app-admin')

@section('title', 'kelola-akun | SI SALUT PEI')

@section('content')
    <section class="section my-3">
        <div class="section-header">
            <h1>Kelola Akun</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Kelola Akun</a></div>
                <div class="breadcrumb-item">Tabel</div>
            </div>
        </div>
        <h2 class="section-title">Data Akun</h2>
        <p class="section-lead d-flex justify-content-between">
            Data Akun yang dapat login ke SI SALUT PEI
        </p>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title fw-bold text-dark my-2">Kelola Akun</h5>
                <button class="btn btn-primary me-md-2 p-2 ms-0" id="modal-akun-tambah"><i class="fa fa-plus me-1"></i>&nbsp
                    Tambah Akun</button>
            </div>
            <!-- Modal Tambah Akun -->
            <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data" class="modal-part"
                id="modal-create-akun">
                @csrf
                <div class="grup-modal-body">
                    <div class="container">
                        <div class="form-group mb-2 me-5">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="foto_profil">Foto Profil</label>
                            <input type="file" name="foto_profil" id="formFile"
                                class="form-control @error('foto_profil') is-invalid @enderror"
                                style="padding-bottom: 38px;">
                            @error('foto_profil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="anggota">Pimpinan</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
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
                        <table id="example1"
                            class="table table-bordered table-hover table-striped text-dark dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">
                                        #
                                    </th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Foto Profil</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img class="rounded-circle"
                                                src="{{ asset('admin_img/' . $user->foto_profil) }}" alt=""
                                                width="50px" height="50px"> </td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            {{-- <button class="btn btn-primary btn-sm" id="modal-user-edit{{ $user->id }}"
                                                onclick="modal_edit({{ $user->id }})"><i
                                                    class="fas fa-edit"></i></button> --}}
                                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#exampleModal{{ $user->id }}"><i
                                                    class="fas fa-edit"></i></button>

                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="exampleModal{{ $user->id }}" data-backdrop="false">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('akun.update', $user->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Akun</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="grup-modal-body">
                                                                    <div class="container">
                                                                        <div class="form-group mb-2">
                                                                            <label for="name">Nama</label>
                                                                            <input type="text" name="name"
                                                                                id="name"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                value="{{ $user->name }}">
                                                                            @error('name')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" name="email"
                                                                                id="email"
                                                                                class="form-control @error('email') is-invalid @enderror"
                                                                                value="{{ $user->email }}">
                                                                            @error('email')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Password</label>
                                                                            <input type="password"
                                                                                class="form-control @error('password') is-invalid @enderror"
                                                                                id="password" name="password"
                                                                                placeholder="Password">
                                                                            @error('password')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-2">
                                                                            <label for="foto_profil">Foto Profil</label>
                                                                            <input type="file" name="foto_profil"
                                                                                id="foto_profil"
                                                                                class="form-control @error('foto_profil') is-invalid @enderror"
                                                                                value="{{ $user->foto_profil }}">
                                                                            @error('foto_profil')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="status">Status</label>
                                                                            <select name="status" id="status"
                                                                                class="form-control @error('status') is-invalid @enderror"
                                                                                required>
                                                                                <option
                                                                                    {{ $user->status == 'aktif' ? 'selected' : '' }}>
                                                                                    Aktif</option>
                                                                                <option
                                                                                    {{ $user->status == 'nonaktif' ? 'selected' : '' }}>
                                                                                    Nonaktif</option>
                                                                            </select>
                                                                            @error('status')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="role">Role</label>
                                                                            <select name="role" id="role"
                                                                                class="form-control @error('role') is-invalid @enderror">
                                                                                <option value="">Pilih Role</option>
                                                                                <option value="admin">Admin</option>
                                                                                <option value="pimpinan">Pimpinan</option>
                                                                            </select>
                                                                            @error('role')
                                                                                <div class="invalid-feedback">
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
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Edit Akun -->
                                            {{-- <form class="modal-part" id="modal-update-edit{{ $user->id }}"
                                                method="POST" action="{{ route('akun.update', $user->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="grup-modal-body">
                                                    <div class="container">
                                                        <div class="form-group mb-2">
                                                            <label for="name">Nama</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                value="{{ $user->name }}">
                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                value="{{ $user->email }}">
                                                            @error('email')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="foto_profil">Foto Profil</label>
                                                            <input type="file" name="foto_profil" id="foto_profil"
                                                                class="form-control @error('foto_profil') is-invalid @enderror"
                                                                value="{{ $user->foto_profil }}">
                                                            @error('foto_profil')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status"
                                                                class="form-control @error('status') is-invalid @enderror"
                                                                required>
                                                                <option {{ $user->status == 'aktif' ? 'selected' : '' }}>
                                                                    Aktif</option>
                                                                <option
                                                                    {{ $user->status == 'nonaktif' ? 'selected' : '' }}>
                                                                    Nonaktif</option>
                                                            </select>
                                                            @error('status')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="role">Role</label>
                                                            <select name="role" id="role"
                                                                class="form-control @error('role') is-invalid @enderror">
                                                                <option value="">Pilih Role</option>
                                                                <option value="admin">Admin</option>
                                                                <option value="anggota">Anggota</option>
                                                            </select>
                                                            @error('role')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> --}}

                                            {{-- <a href="#" type="submit" class="btn btn-danger btn-sm delete"
                                                data-id="{{ $user->name }}">
                                                <i class="fas fa-trash"></i>
                                        </a> --}}

                                            <a href="{{ route('akun.destroy', $user->id) }}"
                                                class="btn btn-sm btn-circle btn-danger hapus"><i
                                                    class="fa fa-trash"></i></a>
                                            {{-- <form action="{{ route('akun.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')

                                            </form> --}}
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
                                    window.location = "{{ route('akun.index') }}"
                                });
                            }
                        })
                    } else {
                        swal("Data aman!");
                    }
                });

            return false;
        });
        // $(document).ready(function() {

        // })
    </script>
@endpush
