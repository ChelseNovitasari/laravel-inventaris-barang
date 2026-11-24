@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Detail Barang</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Kode Barang</th>
                                <td>{{ $barang->kode }}</td>
                            </tr>

                            <tr>
                                <th>Nama Barang</th>
                                <td>{{ $barang->nama_barang }}</td>
                            </tr>

                            <tr>
                                <th>Kategori</th>
                                <td>{{ $barang->kategori }}</td>
                            </tr>

                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $barang->jumlah }}</td>
                            </tr>

                            <tr>
                                <th>Kondisi</th>
                                <td>{{ $barang->kondisi }}</td>
                            </tr>

                            <tr>
                                <th>Created_at</th>
                                <td>{{ $barang->created_at->format('d-m-Y | H:i:s') }}</td>
                            </tr>
                        </table>

                        <div class="justify-content-end d-flex">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
