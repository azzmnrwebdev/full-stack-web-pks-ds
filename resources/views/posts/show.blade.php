@extends('page.index')

@section('judul')
    Detail Posts
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Penulis Posts: <b>{{ $posts->users->username }}</b></h3>
        </div>
        <div class="card-body">
            <p class="text-muted">Post dibuat: {{ $posts->created_at }} | Post diupdate: {{ $posts->updated_at }}</p>
            <div class="row mb-4">
                <div class="col-md-8 mb-3" style="padding-right:15px;">
                    <img src="{{ asset('post/' . $posts->foto) }}" class="card-img-top mb-5" alt="posts">
                    <p style="color: #888888">{{ $posts->caption }}</p>
                </div>
                <div class="col-md-4 mb-3" style="padding-left:10px;">
                    <h3>Comment</h3>
                    <h6 class="text-uppercase pb-80">{{ $posts->comment->count() }} Comments</h6>

                    <form action="/comment" class="my-3" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Beri komentar</label>
                            <input type="hidden" value="{{ $posts->id }}" name="posts_id">
                            <textarea name="comment" class="form-control" rows="5"></textarea>
                        </div>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>

            @foreach ($posts->comment as $comment)
                <div class="card">
                    <div class="card-body">
                        <div class="container pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <b>{{ $comment->user->username }}</b> | <small>{{ $comment->created_at }}</small>
                                    <p class="card-text">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-uppercase pb-80">{{ $comment->reply->count() }} Reply</h6>

                        @if ($comment->reply->count() > 0)
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    @foreach ($comment->reply as $reply)
                                        <div class="container pt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <b>{{ $reply->user->username }}</b> |
                                                    <small>{{ $reply->created_at }}</small>
                                                    <p class="card-text">{{ $reply->reply }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col">
                                <form action="/reply" class="my-3" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Reply</label>
                                        <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                        <textarea name="reply" class="form-control" rows="2"></textarea>
                                    </div>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
