@extends('layouts.template')
@section('title')
Detail Siswa
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-2 mb-2">
                    <a href="/siswa"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="mt-2">
                    <table class="table table-hover">
                        <tr>
                            <th>Nomor Induk Siswa (NIS)</th>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Induk Siswa Nasional (NISN)</th>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap Siswa</th>
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
