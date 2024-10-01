@extends('kasir.layouts.mainlayout')

@section('content')
<style>
   .img-bordered {
    border: 2px solid grey; /* Ganti warna sesuai kebutuhan */
    border-radius: 50%; /* Membuat gambar menjadi bulat */
    width: 200px; /* Atur lebar gambar */
    height: 200px; /* Atur tinggi gambar */
    object-fit: cover; /* Memastikan gambar terpotong dengan baik dalam lingkaran */
}

</style>

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
           
        </div>
    </div>

<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                <div class="col-12 text-center">
                    <h3>Kasir Profile</h3>
                </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('kasir.update-profile') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name_kasir" class="col-md-4 col-form-label text-md-right">{{ __('Nama Kasir') }}</label>
                            <div class="col-md-6">
                                <input id="name_kasir" type="text" class="form-control @error('name_kasir') is-invalid @enderror" name="name_kasir" value="{{ old('name_kasir', $kasir->name_kasir) }}" required autocomplete="name_kasir" autofocus>
                                @error('name_kasir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telepon" class="col-md-4 col-form-label text-md-right">{{ __('No. Telepon') }}</label>
                            <div class="col-md-6">
                                <input id="no_telepon" type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon', $kasir->no_telepon) }}" autocomplete="no_telepon">
                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $kasir->email) }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-6">
                                <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                                    <option value="Laki-laki" {{ (old('jenis_kelamin', $kasir->jenis_kelamin) == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ (old('jenis_kelamin', $kasir->jenis_kelamin) == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($kasir->foto)
                                <img src="{{ asset('storage/kasir_photos/'.$kasir->foto) }}" alt="Kasir Photo" class="mt-2 img-bordered" style="max-width: 200px;">
                                @else
                                    <p class="mt-2">No photo uploaded</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection