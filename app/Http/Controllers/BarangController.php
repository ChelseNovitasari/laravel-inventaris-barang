<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->get();

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'        => 'required|string|max:50|unique:barangs,kode',
            'nama_barang' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'jumlah'      => 'required|integer|min:0',
            'kondisi'     => 'required|string|max:100',
        ], [
            'kode.required'        => 'Kode barang wajib diisi.',
            'kode.string'          => 'Kode barang harus berupa teks.',
            'kode.max'             => 'Kode barang maksimal 20 karakter.',
            'kode.unique'          => 'Kode barang ini sudah digunakan, silakan pakai kode lain.',

            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.string'   => 'Nama barang harus berupa teks.',
            'nama_barang.max'      => 'Nama barang maksimal 255 karakter.',

            'kategori.required'    => 'Kategori barang wajib dipilih.',
            'kategori.string'      => 'Kategori barang tidak valid.',
            'kategori.max'         => 'Kategori barang maksimal 100 karakter.',

            'jumlah.required'      => 'Jumlah barang wajib diisi.',
            'jumlah.integer'       => 'Jumlah barang harus berupa angka bulat.',
            'jumlah.min'           => 'Jumlah barang tidak boleh kurang dari 0.',

            'kondisi.required'     => 'Kondisi barang wajib dipilih.',
            'kondisi.string'       => 'Kondisi barang tidak valid.',
            'kondisi.max'          => 'Kondisi barang maksimal 100 karakter.',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);

        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode'        => 'required|string|max:50|unique:barangs,kode,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'jumlah'      => 'required|integer|min:0',
            'kondisi'     => 'required|string|max:100',
        ], [
            'kode.required'        => 'Kode barang wajib diisi.',
            'kode.string'          => 'Kode barang harus berupa teks.',
            'kode.max'             => 'Kode barang maksimal 50 karakter.',
            'kode.unique'          => 'Kode barang ini sudah dipakai barang lain, silakan gunakan kode lain.',

            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.string'   => 'Nama barang harus berupa teks.',
            'nama_barang.max'      => 'Nama barang maksimal 255 karakter.',

            'kategori.required'    => 'Kategori barang wajib dipilih.',
            'kategori.string'      => 'Kategori barang tidak valid.',
            'kategori.max'         => 'Kategori barang maksimal 100 karakter.',

            'jumlah.required'      => 'Jumlah barang wajib diisi.',
            'jumlah.integer'       => 'Jumlah barang harus berupa angka bulat.',
            'jumlah.min'           => 'Jumlah barang tidak boleh kurang dari 0.',

            'kondisi.required'     => 'Kondisi barang wajib dipilih.',
            'kondisi.string'       => 'Kondisi barang tidak valid.',
            'kondisi.max'          => 'Kondisi barang maksimal 100 karakter.',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
