@extends('page.index')

@section('judul')
    Dashboard
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
            <h1 style="color: #7e0de7;">Media Online</h1>
            <h3 style="color: #18d48c;">Sosial Media Developer</h3>
            <p>Belajar dan berbagi agar hidup menjadi lebih baik</p>
            <h3 style="color: #d87093;">Benefit Join di Media Online</h3>
            <ul>
                <li>Mendapatkan motivasi dari sesama para Developer</li>
                <li>Sharing knowlenge</li>
                <li>Dibuat oleh calon web developer terbaik</li>
            </ul>
            <h3 style="color: #14c0cc;">Cara Bergabung ke Media Online</h3>
            <ol>
                <li>Mengunjungi Website ini</li>
                <li>Mendaftarkan di <a href="#" style="text-decoration: none;color: blue;" title="SIlahkan Register"><b>Form
                            Sign Up</b></a></li>
                <li>Selesai</li>
            </ol>
        </div>
    </div>
@endsection
