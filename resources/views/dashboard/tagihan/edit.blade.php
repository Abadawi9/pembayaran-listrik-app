@extends('layouts.app')
@section('title', 'Ubah Data Tagihan')

@section('title-header', 'Ubah Data Tagihan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('tagihans.index') }}">Data Tagihan</a></li>
    <li class="breadcrumb-item active">Ubah Data Tagihan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Tagihan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('tagihans.update', $tagihan->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="pelanggan_id">Tagihan</label>
                                    <select class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id" name="pelanggan_id">
                                        <option value="" selected>---Tagihan---</option>
                                        @foreach ($pelangans as $p)
                                            <option value="{{ $p->id }}" @if (old('pelanggan_id', $tagihan->pelanggan->id) == $p->id) selected @endif>
                                                {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('pelanggan_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="tahun">Tahun</label>
                                    <select class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun">
                                        <option value="" selected>---Tahun---</option>
                                        @for ($i = date('Y'); $i >= date('Y')-5; $i--)
                                            <option value="{{ $i }}" @if (old('tahun', $tagihan->tahun) == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
        
                                    @error('tahun')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="bulan">Bulan</label>
                                    <select class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan">
                                        <option value="" selected>---Bulan---</option>
                                        @php
                                            $bulans = [
                                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                            ];
                                        @endphp
                                        @foreach ($bulans as $i)
                                            <option value="{{ $i }}" @if (old('bulan', $tagihan->bulan) == $i) selected @endif>{{ $i }}</option>
                                        @endforeach
                                    </select>

                                    @error('bulan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="jml_pemakaian">Jml Pemakaian</label>
                                    <input type="number" class="form-control @error('jml_pemakaian') is-invalid @enderror" id="jml_pemakaian"
                                        placeholder="Jml Pemakaian Tagihan" value="{{ old('jml_pemakaian', $tagihan->jml_pemakaian) }}" name="jml_pemakaian">

                                    @error('jml_pemakaian')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="status">Status</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                @php
                                                    $roles = ['belum lunas', 'lunas'];
                                                @endphp
                                                <option value="" selected>---Status---</option>
                                                @foreach ($roles as $status)
                                                    <option value="{{ $status }}" @if (old('status', $tagihan->status) == $status) selected @endif>
                                                        {{ $status }}</option>
                                                @endforeach
                                            </select>
                
                                            @error('status')
                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('tagihans.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
