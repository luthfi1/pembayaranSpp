@extends('layouts.template')

@section('title')
Spp Pertahun
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- <form action="{{ route('spp.index') }}" method="get">
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="text" name="keyword" value="{{ Request::get('keyword') }}"
                        class="form-control" placeholder="Telusuri">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form> -->
        <div class="card">
            <div class="card-body">
                
                <div class="mt-2 mb-2 text-right">
                    @if(Request::get('keyword'))
                        <a href="/spp"><i class="fa fa-arrow-left"></i> Kembali</a>
                    @else
                        <a href="/spp/create"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th>Jumlah SPP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($spp as $row)
                        <tr>
                            <td>{{$loop->iteration + ($spp->perpage() * ($spp->currentPage() -1))}}</td>
                            <td>{{$row->tahun}}</td>
                            <td>Rp. {{$row->nominal}}</td>
                            <td>
                                <form action="{{route('spp.destroy', $row->id)}}" method="post" onsubmit="return confirm('Hapus Tahun {{$row->tahun}}?')">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <a href="{{route('spp.edit',[$row->id])}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$spp->appends(Request::all())->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
