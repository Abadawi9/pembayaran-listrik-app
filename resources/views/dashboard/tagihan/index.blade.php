@extends('layouts.app')
@section('title', 'Data Tagihan')

@section('title-header', 'Data Tagihan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Tagihan</li>
@endsection

@section('action_btn')
    <a href="{{route('tagihans.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Tagihan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Bulan & Tahun</th>
                                    <th>Jumlah Pemakaian</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tagihans as $tagihan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tagihan->pelanggan->nama }}</td>
                                        <td>{{ $tagihan->bulan }} {{ $tagihan->tahun }}</td>
                                        <td>{{ $tagihan->jml_pemakaian }}</td>
                                        <td>{{ 'Rp.'.number_format($tagihan->total_bayar, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($tagihan->status == 'lunas')
                                                <span class="badge badge-success">{{ $tagihan->status }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $tagihan->status }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex jutify-content-center">
                                            @if ($tagihan->status == 'belum lunas')
                                                <form id="bayar-form-{{ $tagihan->id }}" action="{{ route('tagihans.bayar', $tagihan->id) }}" class="d-none" method="post">
                                                    @csrf
                                                    <input type="file" name="bukti" id="bukti-{{ $tagihan->id }}">
                                                </form>
                                                <button type="button" onclick="BayarTagihan({{ $tagihan->id }})" class="btn btn-success btn-sm" title="Bayar Tagihan">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @else
                                                <a target="_blank" href="{{route('tagihans.struk', $tagihan->id)}}" class="btn btn-success btn-sm" title="Lihat Bukti">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endif
                                            <a href="{{route('tagihans.edit', $tagihan->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $tagihan->id }}" action="{{ route('tagihans.destroy', $tagihan->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$tagihan->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $tagihans->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            }) 

        }

        function BayarTagihan(id){  
            Swal.fire({
                title: 'Bayar Tagihan',
                input: 'hidden',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Bayar',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`/tagihans/${id}/bayar`, {
                        method: 'POST',
                        body: JSON.stringify({
                            _token: '{{ csrf_token() }}',
                            tagihan_id: id,
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.statusText)
                        }
                        // console.log(response);
                        return response.json()
                    })
                    .catch(error => {
                        console.log(error);
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.value.success) {
                    Swal.fire("Berhasil bayar tagihan")
                }
                if(result.isConfirmed){
                    window.location.reload()
                }
            })
        }
    </script>
@endsection