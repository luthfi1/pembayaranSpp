@extends('layouts.template')

@section('title')
Tambah Nominal SPP
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('petugas.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Nama Petugas</label>
                        <input type="text" required="required" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Username</label>
                        <input type="text" required="required" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Email</label>
                        <input type="email" required="required" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Password</label>
                        <input type="password" required="required" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Level</label>
                        <select name="level" id="" class="form-control">
                            <option value="petugas">Petugas</option>
                            <option value="administrator">Administrator</option>
                        </select>
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
