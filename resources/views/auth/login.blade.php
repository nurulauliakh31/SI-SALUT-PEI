@extends('layouts.app')

@section('content')

<section>
    <div class="container py-4">
        <div class="row d-md-flex justify-content-md-center my-sm-0">
            <div class="col-auto px-md-0 py-sm-0 my-sm-0">
                <div class="card mt-3">
                    <div class="card-body pt-md-0 pb-md-0 ps-md-0 pe-md-0 my-sm-0 py-sm-0">
                        <div class="row d-flex flex-column-reverse flex-md-row mx-md-0">
                            <div class="col px-md-4 py-md-4 py-4 py-lg-5 px-lg-5 px-xl-5 py-xl-5">
                                <h3 class="fw-bold mt-4">Masuk</h3>
                                <p class="text-muted">Silahkan masuk terlebih dahulu</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-3 mt-3">
                                        <div class="col mb-xxl-0 mb-md-0">
                                            <input id="email" type="email" class="border form-control py-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email Anda">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col my-md-0">
                                            <input class="border form-control py-2 @error('password') is-invalid @enderror" name="password" type="password" placeholder="Masukkan password"
                                                   autocomplete="current-password" required />

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row d-flex d-md-flex flex-column flex-md-row align-items-md-center my-3">
                                        <div class="col d-flex justify-content-center justify-content-md-start">
                                            <div class="form-check d-flex align-items-center" style="margin-bottom: 0px;">
                                                <input id="formCheck-1" class="form-check-input me-2" type="checkbox" style="font-size: 14px;margin-top: 0px;" name="remember" id="remember"
                                                       {{ old('remember') ? 'checked' : '' }} />
                                                <label class="form-check-label fw-semibold" for="formCheck-1" style="font-size: 14px;">
                                                    Ingat Saya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-md-center d-flex justify-content-center justify-content-md-end my-2 py-md-0">
                                            <a class="fw-semibold" href="{{ route('password.request') }}" style="font-size: 14px; color:#FF3500; text-decoration: none">Lupa kata sandi ?
                                            </a>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary border rounded-pill my-md-0" type="submit" style="background: #000033;width: 100%;">
                                        Masuk
                                    </button>
                                </form>
                                <div class="row text-center">
                                    <div class="col mt-5 text-muted">
                                        <i class="far fa-copyright" style="font-size: 12px;"></i>
                                        <label class="form-label" style="font-size: 12px;">
                                            2023 SI SALUT PEI all right reserved
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-light py-md-5 px-md-5 px-4 pt-3 pb-md-3 px-xl-5 py-sm-4 px-lg-5"
                                 style="background: #000033;border-top-left-radius: 24px;border-bottom-left-radius: 24px;">
                                <div class="row">
                                    <div class="col">
                                        <h2>Selamat Datang</h2>
                                        <h6 class="pt-3 pb-4">SI SALUT PEI hadir untuk memilih mahasiswa lulusan terbaik di PEI</h6>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col">
                                        <img class="img-fluid" src="{{ asset('assets/img/img-login.png') }}" width="400px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
