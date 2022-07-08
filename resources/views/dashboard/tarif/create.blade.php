@extends('layouts.app')
@section('title', 'Tambah Data Tarif')

@section('title-header', 'Tambah Data Tarif')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('tarifs.index') }}">Data Tarif</a></li>
    <li class="breadcrumb-item active">Tambah Data Tarif</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Tarif</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('tarifs.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="daya">Daya</label>
                                    <input type="number" class="form-control @error('daya') is-invalid @enderror" id="daya"
                                        placeholder="Daya Tarif" value="{{ old('daya') }}" name="daya">

                                    @error('daya')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="tarif">Tarif</label>
                                    <input type="number" class="form-control @error('tarif') is-invalid @enderror"
                                        id="tarif" placeholder="Tarif Tarif" value="{{ old('tarif') }}"
                                        name="tarif">

                                    @error('tarif')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="beban">Beban</label>
                                    <input type="number" class="form-control @error('beban') is-invalid @enderror"
                                        id="beban" placeholder="Beban Tarif" value="{{ old('beban') }}"
                                        name="beban">

                                    @error('beban')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('tarifs.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
