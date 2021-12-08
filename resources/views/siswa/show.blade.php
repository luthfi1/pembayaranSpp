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
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Kompetensi Keahlian</th>
                            <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Masuk</th>
                            <td>{{ $siswa->spp->tahun }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-2 mb-2">
                    Riwayat Transaksi Pembayaran SPP
                </div>
                <div class="mt-2">
                    <table class="table table-hover">
                    @if($pembayaran)

                        <thead>
                            <tr>
                                <th>Tanggal Pembayaran</th>
                                <th>Pembayaran Bulan</th>
                                <th>Jumlah Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $row)
                            <tr>
                                <td>{{$row->tanggal_bayar}}</td>
                                <td>{{$row->bulan_dibayar}}</td>
                                <td>Rp. {{$row->total_bayar}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                            <div class="alert alert-danger text-center">
                                <p>Belum ada transaksi</p>
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
