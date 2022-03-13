@extends('page.index')

@section('judul')
    Halaman Create Posts
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Create Posts</h3>
        </div>
        <div class="card-body">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Caption</label>
                    <textarea name="caption" class="form-control @error('caption') is-invalid @enderror"
                        placeholder="Enter your caption is posts" cols="30" rows="5"></textarea>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary" value="submit">Submit</button>
                <button class="btn btn-danger ml-1" value="reset">Reset</button>
            </form>
        </div>
    </div>
@endsection
