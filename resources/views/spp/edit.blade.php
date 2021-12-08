@extends('layouts.template')

@section('title')
Ubah SPP
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="{{route('spp.update', $spp->id)}}" method="post" class="form-horizontal">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="" class="form-label">Tahun</label>
                        <input type="number" required="required" value="{{$spp->tahun}}" name="tahun" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nominal</label>
                        <input type="number" required="required" value="{{$spp->nominal}}" name="nominal" class="form-control">
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
