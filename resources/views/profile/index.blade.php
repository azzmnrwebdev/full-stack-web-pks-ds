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
            @forelse ($profiles as $item)
            @php
                if(!empty($item->foto)) {
                @endphp
                    <img src="{{ asset('img')}}/{{ $item->foto }}" class="img-circle mb-3" width="75" height="75" />
                @php
                } else {
                @endphp
                    <img src="{{ asset('img')}}/no_picture.png" class="img-circle mb-3" width="75" height="75" />
                @php
                }
            @endphp
            <h4>Hey, I am {{ $item->fullname }} ({{ $item->age }})</h4>
            <p class="text-muted">{{ $item->address }} - {{ $item->country }}
            </p>
            <p class="profile-intro">{{ $item->bio }}</p>

            @foreach ($person as $p)
                <p class="text-center"><span class="h4 mr-1">{{ $p->followers()->get()->count() }}</span> Follower<span
                        class="h4 mr-1 ml-4">{{ $p->followings()->get()->count() }}</span> Following
                </p>
            @endforeach

            <a class="btn btn-outline-warning" style="color: #636262" href="/profile/{{ $item->id }}/edit"
                title="klik untuk mengedit data"><i class="fas fa-edit"></i>
                Edit Profile
            </a>
            @empty

            @endforelse

        </section>
    </div>
</div>
@endsection

