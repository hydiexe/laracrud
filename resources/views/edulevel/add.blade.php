@extends('main')

@section('title', 'Edulevel')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Jenjang</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="">Edulevel</a></li>
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content') 
<div class="content mt-3">
 
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Jenjang</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('edulevels') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="{{ url('edulevels') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Jenjang</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" 
                                    autofocus 
                                    {{-- required --}}
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea 
                                    name="desc" 
                                    class="form-control @error('desc') is-invalid @enderror"
                                    {{-- required --}}
                                >{{ old('desc') }}</textarea>
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection