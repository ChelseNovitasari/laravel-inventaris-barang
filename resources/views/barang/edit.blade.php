@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Barang</div>
                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('barang.update', $barang->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="kode">Kode Barang</label>
                            <input type="text" name="kode" id="kode" class="form-control"
                                value="{{ old('kode', $barang->kode) }}">
                        </div>

                        <div class="mb-2">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                value="{{ old('nama_barang', $barang->nama_barang) }}">
                        </div>

                        <div class="mb-2">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="" hidden>-- pilih kategori --</option>
                                <option value="Elektronik" {{ old('kategori', $barang->kategori) == 'Elektronik' ? 'selected' : null }}>Elektronik</option>
                                <option value="ATK" {{ old('kategori', $barang->kategori) == 'ATK' ? 'selected' : null }}>ATK</option>
                                <option value="Furniture" {{ old('kategori', $barang->kategori) == 'Furniture' ? 'selected' : null }}>Furniture</option>
                                <option value="Lainnya" {{ old('kategori', $barang->kategori) == 'Lainnya' ? 'selected' : null }}>Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" min="0" class="form-control"
                                value="{{ old('jumlah', $barang->jumlah) }}">
                        </div>

                        <div class="mb-2">
                            <label for="kondisi">Kondisi</label>
                            <select name="kondisi" id="kondisi" class="form-control">
                                <option value="" hidden>-- pilih kondisi --</option>
                                <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : null }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : null }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : null }}>Rusak Berat</option>
                            </select>
                        </div>

                        <div class="justify-content-end d-flex mt-3">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush
