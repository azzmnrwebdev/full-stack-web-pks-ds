@extends('page.index')

@section('judul')
    Homepage
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halaman Home</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-success mb-4" href="/posts/create" title="klik untuk membuat posts"><i
                    class="fas fa-plus"></i>
                Create Posts
            </a>
            <div class="row row-cols-1 row-cols-md-4">
                @forelse ($posts as $item)
                    <div class="col mb-3">
                        <a href="/posts/{{ $item->id }}">
                            <div class="card h-100">
                                <img src="{{ asset('post/' . $item->foto) }}" class="card-img-top"
                                    style="padding: 5px 5px 0 5px; max-height:300px" alt="posts">
                                <div class="card-body">
                                    <p class="card-text" style="font-size: 14px;color: #2c2c2c">
                                        <b>{{ $item->users->username }}</b>
                                    </p>
                                    <small>
                                        <p class="card-text text-info">{{ $item->created_at }}</p>
                                    </small>
                                    <p class="card-text" style="color: #888888">
                                        {{ Str::limit($item->caption, 100, '...') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                @empty
                    <h3>Data not found</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection
