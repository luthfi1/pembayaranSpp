@extends('layouts.template')

@section('title')
Edit Siswa
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('siswa.update', $siswa->id)}}" method="post" class="form-horizontal">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="" class="form-label">Nama Siswa</label>
                        <input type="text" required="required" value="{{$siswa->nama}}" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Induk Siswa (NIS)</label>
                        <input type="numeric" required="required" value="{{$siswa->nis}}" name="nis" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                        <input type="numeric" required="required" value="{{$siswa->nisn}}" name="nisn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label-control">Kelas</label>
                        <select name="id_kelas" class="form-control" required="required">
                            <option class="text-primary text-bold" value="{{ $siswa->kelas->id }}">{{ $siswa->kelas->nama_kelas }}</option>
                            @foreach($kelas as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-control">Tahun Masuk</label>
                        <select name="id_spp" class="form-control" required="required">
                            <option class="text-primary text-bold" value="{{ $siswa->spp->id }}">{{ $siswa->spp->tahun }}</option>
                            @foreach($spp as $row)
                                <option value="{{ $row->id }}">{{ $row->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Siswa</label>
                        <textarea class="form-control" name="alamat" id="" cols="3">{{$siswa->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Telepon Siswa (wa)</label>
                        <input type="numeric" required="required" value="{{$siswa->nomor_telepon}}" name="nomor_telepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
