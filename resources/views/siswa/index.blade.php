@extends('layouts.template')

@section('title')
Data siswa
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('siswa.index') }}" method="get">
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="text" name="keyword" value="{{ Request::get('keyword') }}"
                        class="form-control" placeholder="Telusuri">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-body">
                <div class="mt-2 mb-2 text-right">
                    @if(Request::get('keyword'))
                        <a href="/siswa"><i class="fa fa-arrow-left"></i> Kembali</a>
                    @else
                        <a href="/siswa/create"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nis</th>
                            <th>Nisn</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $row)
                        <tr>
                            <td>{{$loop->iteration + ($siswa->perpage() * ($siswa->currentPage() -1))}}</td>
                            <td>{{$row->nis}}</td>
                            <td>{{$row->nisn}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->kelas->nama_kelas}}</td>
                            <td>
                                <form action="{{route('siswa.destroy', $row->id)}}" method="post" onsubmit="return confirm('Hapus {{$row->nama}} ?')">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <a href="{{route('siswa.edit',[$row->id])}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('siswa.show',[$row->id])}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$siswa->appends(Request::all())->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
