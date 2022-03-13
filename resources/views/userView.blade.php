@extends('page.index')

@section('judul')
    Profile
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
<script src="{{ asset('js/custom.js') }}" defer></script>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Profile</h3>
    </div>
    <div class="card-body">
        <section class="Profile-header text-center">
            @php
                if(!empty($profiles->foto)) {
                @endphp
                    <img src="{{ asset('img')}}/{{ $profiles->foto }}" class="img-circle mb-3" width="75" height="75" />
                @php
                } else {
                @endphp
                    <img src="{{ asset('img')}}/no_picture.png" class="img-circle mb-3" width="75" height="75" />
                @php
                }
            @endphp
            <h4>Hey, I am {{ $profiles->fullname }} ({{ $profiles->age }})</h4>
            <p class="text-muted">{{ $profiles->address }} - {{ $profiles->country }}
            </p>
            <p class="profile-intro">{{ $profiles->bio }}</p>
            <p class="text-center"><span class="h4 mr-1">{{ $user->followers()->get()->count() }}</span> Follower<span
                    class="h4 mr-1 ml-4">{{ $user->followings()->get()->count() }}</span> Following
            </p>
        </section>
    </div>
</div>
@endsection
