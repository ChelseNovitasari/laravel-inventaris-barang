@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang</div>

                <div class="card-body">
                    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-2">Tambah</a>

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Kondisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kode }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori }}</td>
                                <td>{{ $barang->jumlah }}</td>
                                <td>{{ $barang->kondisi }}</td>
                                <td class="text-center">
                                    <a href="{{ route('barang.show', $barang->id) }}"
                                        class="btn btn-secondary btn-sm">Detail</a>

                                    <a href="{{ route('barang.edit', $barang->id) }}"
                                        class="btn btn-success btn-sm">Update</a>

                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="if (confirm({{ Js::from('Yakin ingin menghapus barang ' . $barang->nama_barang . ' (' . $barang->kode . ')?') }})) { event.preventDefault(); document.getElementById('delete-form-{{ $barang->id }}').submit(); }">
                                        Delete
                                    </button>

                                    <form id="delete-form-{{ $barang->id }}"
                                        action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
