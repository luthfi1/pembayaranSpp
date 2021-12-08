@extends('layouts.template')

@section('title')
Tambah Nominal SPP
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('spp.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Tahun</label>
                        <input type="number" required="required" name="tahun" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nominal</label>
                        <input type="number" required="required" name="nominal" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
