@extends('page.index')

@section('judul')
    List of Users
@endsection

@section('content')
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Users</h3>
        </div>
        <div class="card-body">
            <div class="row row-cols-1">
                @include('userList', ['users'=>$users])
            </div>
        </div>
    </div>
@endsection
