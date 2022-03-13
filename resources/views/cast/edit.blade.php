@extends('page.index')

@section('judul')
    Form Edit Cast
@endsection

@section('content')
    @foreach ($dataCast as $cast)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Data Pemain: <b>{{ $cast->nama }}</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="/cast/{{ $cast->id }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nama Pemain</label>
                        <input type="text" name="nama" value="{{ $cast->nama }}" placeholder="isi nama anda"
                            class="form-control @error('nama') is-invalid @enderror" autocomplete="off" />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Umur Pemain</label>
                        <input type="number" name="umur" value="{{ $cast->umur }}" placeholder="isi umur anda"
                            class="form-control @error('umur') is-invalid @enderror" autocomplete="off" min="18" />
                        @error('umur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" cols="30" rows="5" placeholder="isi keluhan penyakit anda"
                            class="form-control @error('bio') is-invalid @enderror">{{ $cast->bio }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/cast') }}" class="btn btn-outline-primary">Kembali</a>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
    @endforeach
@endsection
