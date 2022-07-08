@extends('layouts.app')
@section('title', 'Tambah Data Pelanggan')

@section('title-header', 'Tambah Data Pelanggan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pelanggans.index') }}">Data Pelanggan</a></li>
    <li class="breadcrumb-item active">Tambah Data Pelanggan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pelanggans.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Nama Pelanggan" value="{{ old('nama') }}" name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" placeholder="Alamat Pelanggan" value="{{ old('alamat') }}"
                                        name="alamat">

                                    @error('alamat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="no_telp">NO Telp</label>
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp" placeholder="NO Telp Pelanggan" value="{{ old('no_telp') }}"
                                        name="no_telp">

                                    @error('no_telp')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="no_meter">NO Meter</label>
                                    <input type="number" class="form-control @error('no_meter') is-invalid @enderror"
                                        id="no_meter" placeholder="NO Meter Pelanggan" value="{{ old('no_meter') }}"
                                        name="no_meter">

                                    @error('no_meter')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="tarif_id">Tarif</label>
                                    <select class="form-control @error('tarif_id') is-invalid @enderror" id="tarif_id" name="tarif_id">
                                        <option value="" selected>---Tarif---</option>
                                        @foreach ($tarif as $tr)
                                            <option value="{{ $tr->id }}" @if (old('tarif_id') == $tr->id) selected @endif>
                                                {{ $tr->daya }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('tarif_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('pelanggans.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
