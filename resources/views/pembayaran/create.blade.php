@extends('layouts.template')

@section('title')
Pembayaran
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pembayaran.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Nama Siswa</label>
                        <select name="id_siswa" class="form-control">
                            @foreach($siswa as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal_bayar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pembayaran Bulan</label>
                        <select name="bulan_dibayar" class="form-control">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>\
        </div>
    </div>
</div>
@endsection
