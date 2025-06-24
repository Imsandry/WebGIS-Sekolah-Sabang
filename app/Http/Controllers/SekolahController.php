<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Menampilkan daftar sekolah dalam bentuk tabel (untuk halaman publik).
     */
    public function index()
    {
        $sekolah = Sekolah::all();
        return view('sekolah.table', compact('sekolah'));
    }

    /**
     * Menampilkan halaman manajemen data sekolah (untuk user yang terautentikasi).
     */
    public function manage()
    {
        $sekolah = Sekolah::all(); // Ambil semua data sekolah untuk ditampilkan
        return view('sekolah.manage', compact('sekolah')); // Anda perlu membuat view ini
    }

    /**
     * Menampilkan form untuk membuat data sekolah baru.
     */
    public function create()
    {
        return view('sekolah.create'); // Anda perlu membuat view ini
    }

    /**
     * Menyimpan data sekolah baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'akreditasi' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'npsn' => 'nullable|string|max:20|unique:sekolah,npsn',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        // Handle upload foto jika ada
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images/sekolah'), $imageName);
            $input['foto'] = $imageName;
        }

        Sekolah::create($input);

        return redirect()->route('sekolah.manage')->with('success', 'Sekolah berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit data sekolah.
     */
    public function edit(Sekolah $sekolah)
    {
        return view('sekolah.edit', compact('sekolah')); // Anda perlu membuat view ini
    }

    /**
     * Memperbarui data sekolah di database.
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'akreditasi' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'npsn' => 'nullable|string|max:20|unique:sekolah,npsn,' . $sekolah->id, // Kecualikan id saat update
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        // Handle upload foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($sekolah->foto && file_exists(public_path('images/sekolah/' . $sekolah->foto))) {
                unlink(public_path('images/sekolah/' . $sekolah->foto));
            }
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('images/sekolah'), $imageName);
            $input['foto'] = $imageName;
        }

        $sekolah->update($input);

        return redirect()->route('sekolah.manage')->with('success', 'Sekolah berhasil diperbarui!');
    }

    /**
     * Menghapus data sekolah dari database.
     */
    public function destroy(Sekolah $sekolah)
    {
        // Hapus foto terkait jika ada
        if ($sekolah->foto && file_exists(public_path('images/sekolah/' . $sekolah->foto))) {
            unlink(public_path('images/sekolah/' . $sekolah->foto));
        }

        $sekolah->delete();

        return redirect()->route('sekolah.manage')->with('success', 'Sekolah berhasil dihapus!');
    }
}
