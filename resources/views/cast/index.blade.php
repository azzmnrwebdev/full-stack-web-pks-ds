@extends('page.index')

@section('judul')
    Data Cast
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
    @php
    $ar_judul = ['No', 'Nama Pemain', 'Umur', 'Bio', 'Terbuat', 'Terupdate', 'Action'];
    $no = 1;
    @endphp
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel ini merupakan kumpulan data cast</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-success mb-3" href="/cast/create" title="klik untuk menambah data"><i
                    class="fas fa-plus  "></i>
                Create Data
            </a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        @foreach ($ar_judul as $jdl)
                            <th>{{ $jdl }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataCast as $cast)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td style="max-width: 150px;overflow: hidden;text-overflow:ellipsis;white-space:nowrap;">
                                {{ $cast->nama }}</td>
                            <td class="text-center">{{ $cast->umur }}</td>
                            <td style="max-width: 150px;overflow: hidden;text-overflow:ellipsis;white-space:nowrap;">
                                {{ $cast->bio }}</td>
                            <td>{{ $cast->created_at }}</td>
                            <td>{{ $cast->updated_at }}</td>
                            <td>
                                <form method="POST" action="/cast/{{ $cast->id }}">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-info" href="/cast/{{ $cast->id }}"
                                        title="klik untuk melihat secara detail"><i class="fas fa-info-circle"></i>
                                        Detail</a>
                                    <a class="btn btn-warning" href="/cast/{{ $cast->id }}/edit"
                                        title="klik untuk mengedit data"><i class="fas fa-user-edit"></i> Edit</a>
                                    <button class="btn btn-danger" onclick="return confirm('Anda yakin data dihapus?')"
                                        title="klik untuk menghapus data"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
@endsection
