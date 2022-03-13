@if ($users->count())
    @foreach ($users as $user)
        @if (Auth::id() !== $user->id)
            <div class="col-md-3 profile-box border rounded text-center bg-light mr-3 mb-3">
                    @php
                        if(!empty($foto->foto)) {
                        @endphp
                            <img src="{{ asset('img')}}/{{ $foto->foto }}" class="img-circle mb-3 mt-3" width="75" height="75" />
                        @php
                        } else {
                        @endphp
                            <img src="{{ asset('img')}}/no_picture.png" class="img-circle mb-3 mt-3" width="75" height="75" />
                        @php
                        }
                    @endphp
                <h5 class="m-0"><a
                        href="{{ route('user.view', $user->id) }}"><strong>{{ $user->username }}</strong></a></h5>
                <p class="mb-2">
                    <small>Following: <span
                            class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></small>
                    <small>Followers: <span
                            class="badge badge-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>
                </p>

                <button class="btn btn-info btn-sm action-follow mb-3" data-id="{{ $user->id }}"><strong>
                        @if (auth()->user()->isFollowing($user))
                            UnFollow
                        @else
                            Follow
                        @endif

                    </strong></button>
            </div>
        @endif
    @endforeach
@endif
