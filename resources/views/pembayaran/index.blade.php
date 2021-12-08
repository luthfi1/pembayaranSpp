@extends('layouts.template')

@section('title')
Data Pembayaran
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-2 mb-2 text-right">
                    @if(Request::get('keyword'))
                        <a href="/pembayaran"><i class="fa fa-arrow-left"></i> Kembali</a>
                    @else
                        <a href="/excel"><i class="fa fa-print"></i> Report</a>
                        <a href="/pembayaran/create" class="ml-2"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Nis</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayaran as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($pembayaran->perpage() * ($pembayaran->currentPage() -1)) }}
                                </td>
                                <td><a href="/siswa/{{ $row->siswa->id }}">{{ $row->siswa->nama }}</a></td>
                                <td>{{ $row->tanggal_bayar }}</td>
                                <td>{{ $row->siswa->nis }}</td>
                                <td>{{ $row->siswa->kelas->nama_kelas }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pembayaran->appends(Request::all())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
