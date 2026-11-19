<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Menampilkan semua layanan
    public function index()
    {
        $layanans = Layanan::all();

        return view('admin.dashboardLayanan', compact('layanans'));
    }

    // Menampilkan form tambah layanan
    public function create()
    {
        return view('admin.tambahLayanan');
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('layanan', 'public');
        }

        Layanan::create($data);

        return redirect()->route('admin.dashboardLayanan')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);

        return view('admin.editLayanan', compact('layanan'));
    }

    // Memperbarui layanan
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('layanan', 'public');
        }

        $layanan->update($data);

        return redirect()->route('admin.dashboardLayanan')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    // Menghapus layanan
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->delete();

        return redirect()->route('admin.dashboardLayanan')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}