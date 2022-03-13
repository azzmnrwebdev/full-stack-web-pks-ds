@extends('page.index')

@section('judul')
    Detail Data Cast
@endsection

@push('script')
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
@endpush

@section('content')
    @foreach ($dataCast as $cast)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detal Data Pemain: {{ $cast->nama }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <h3 class="text-bold">{{ $cast->nama }}</h3>
                        <p class="card-text">
                            Umur Pemain: {{ $cast->umur }} tahun
                            <br />Bio Pemain: <br /> {{ $cast->bio }}
                        </p>
                    </div>
                </div>
                <a href="{{ url('/cast') }}" class="btn btn-primary">Kembali</a>
            </div>
            <!-- /.card-body -->
        </div>
    @endforeach
@endsection
