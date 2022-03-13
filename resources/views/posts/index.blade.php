@extends('page.index')

@section('judul')
    Halaman My Posts
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kumpulan Data Postingan Saya</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-success mb-4" href="/posts/create" title="klik untuk membuat posts"><i
                    class="fas fa-plus"></i>
                Create Posts
            </a>
            <div class="row row-cols-1 row-cols-md-4">
                @forelse ($posts as $item)
                    <div class="col mb-3">
                        <div class="card h-100">
                            <img src="{{ asset('post/' . $item->foto) }}" class="card-img-top"
                                style="padding: 5px 5px 0 5px; max-height:300px" alt="posts">
                            <div class="card-body">
                                <small>
                                    <p class="card-text">{{ $item->created_at }}</p>
                                </small>
                                <p class="card-text">{{ Str::limit($item->caption, 100, '...') }}</p>

                                <form method="POST" action="/posts/{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-sm btn-info" href="/posts/{{ $item->id }}"
                                        title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i>
                                        Detail</a>
                                    <a class="btn btn-sm btn-warning ml-1" href="/posts/{{ $item->id }}/edit"
                                        title="klik untuk mengedit data"><i class="fas fa-user-edit"></i> Edit</a>
                                    <button class="btn btn-sm btn-danger ml-1"
                                        onclick="return confirm('Anda yakin data dihapus?')"
                                        title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>

                @empty
                    <h3>Data not found</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection
