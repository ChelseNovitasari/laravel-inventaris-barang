@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambah Barang</div>
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

                   <form action="{{ route('barang.store') }}" method="POST">
                    @csrf

                        <div class="mb-3">
                            <label for="kode">Kode Barang</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode') }}"
                                placeholder="Contoh: BRG-001">
                        </div>

                        <div class="mb-3">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                value="{{ old('nama_barang') }}" placeholder="Masukkan nama barang">
                        </div>

                        <div class="mb-3">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="" hidden>-- pilih kategori --</option>
                                <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>
                                    Elektronik</option>
                                <option value="ATK" {{ old('kategori') == 'ATK' ? 'selected' : '' }}>ATK</option>
                                <option value="Furniture" {{ old('kategori') == 'Furniture' ? 'selected' : '' }}>
                                    Furniture</option>
                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" min="0" class="form-control"
                                value="{{ old('jumlah') }}" placeholder="Masukkan jumlah barang">
                        </div>

                        <div class="mb-3">
                            <label for="kondisi">Kondisi</label>
                            <select name="kondisi" id="kondisi" class="form-control">
                                <option value="" hidden>-- pilih kondisi --</option>
                                <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>
                                    Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>
                                    Rusak Berat</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@endpush
