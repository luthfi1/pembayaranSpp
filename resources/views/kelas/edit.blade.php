@extends('layouts.template')

@section('title')
Ubah Kelas
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('kelas.update', $kelas->id)}}" method="post" class="form-horizontal">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="" class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" value="{{$kelas->nama_kelas}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Kompetensi Keahlian</label>
                        <select name="kompetensi_keahlian" class="form-control">
                            <option value="{{$kelas->kompetensi_keahlian}}" class="text-bold">{{$kelas->kompetensi_keahlian}}</option>
                            <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                            <option value="Teknik dan Bisnis Sepeda Motor">Teknik dan Bisnis Sepeda Motor</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Farmasi">Farmasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
