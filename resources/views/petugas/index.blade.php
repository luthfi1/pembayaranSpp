@extends('layouts.template')

@section('title')
Data Petugas
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                
                <div class="mt-2 mb-2 text-right">
                    @if(Request::get('keyword'))
                        <a href="/petugas"><i class="fa fa-arrow-left"></i> Kembali</a>
                    @else
                        <a href="/petugas/create"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr>
                            <td>{{$loop->iteration + ($user->perpage() * ($user->currentPage() -1))}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                @if($row->level=='administrator')
                                <span class="badge bg-primary">Administrator</span>
                                @else
                                Petugas
                                @endif
                            </td>
                            <td>
                                <form action="{{route('petugas.destroy', $row->id)}}" onsubmit="return confirm('Hapus {{ $row->name }}?')" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <a href="{{ route('petugas.edit', $row->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$user->appends(Request::all())->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
