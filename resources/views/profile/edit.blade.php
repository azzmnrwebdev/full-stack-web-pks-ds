@extends('page.index')

@section('judul')
    Form Edit Profile
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Profile: <b>{{ $profiles->fullname }}</b></h3>
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
            <form method="POST" action="/profile/{{ $profiles->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fullname">Fullname <span class="text-danger">*</span></label>
                        <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror"
                            name="fullname" value="{{ $profiles->fullname }}" autocomplete="fullname"
                            placeholder="Enter your fullname">

                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country">Country <span class="text-danger">*</span></label>
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                            name="country" value="{{ $profiles->country }}" autocomplete="country"
                            placeholder="Enter your country">

                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                            value="{{ $profiles->phone }}" autocomplete="phone" placeholder="Enter your phone"
                            maxlength="13">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gender">Gender <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender"
                            name="gender" value="{{ $profiles->gender }}" autocomplete="gender"
                            placeholder="Female or Male">

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="age">Age <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age"
                            value="{{ $profiles->age }}" min="15" max="65" placeholder="Age: 15 - 65 year">

                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" cols="30" rows="5" placeholder="Enter your address"
                            class="form-control @error('address') is-invalid @enderror">{{ $profiles->address }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio" cols="30" rows="5" placeholder="Enter your bio"
                            class="form-control @error('bio') is-invalid @enderror">{{ $profiles->bio }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto Profile</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">

                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/profile') }}" class="btn btn-outline-primary">Kembali</a>
            </form>
        </div>
        <!-- /.card-body -->

    </div>
@endsection
