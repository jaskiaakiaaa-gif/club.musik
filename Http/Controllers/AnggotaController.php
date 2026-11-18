<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();

        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
{
    $request->validate([
    'nama_band' => 'required',
    'genre' => 'required',
    'asal' => 'required',
    'tahun_berdiri' => 'required',
    'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->except('foto');

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('foto'), $namaFile);

        $data['foto'] = $namaFile;
    }

    Anggota::create($data);

    return redirect()->route('anggota.index');
}

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
{
    $request->validate([
        'nama_band' => 'required',
        'genre' => 'required',
        'asal' => 'required',
        'tahun_berdiri' => 'required',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->except('foto');

    // Kalau upload foto baru
    if ($request->hasFile('foto')) {

        // Hapus foto lama
        if ($anggota->foto && file_exists(public_path('foto/' . $anggota->foto))) {
            unlink(public_path('foto/' . $anggota->foto));
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('foto'), $namaFile);

        $data['foto'] = $namaFile;
    }

    $anggota->update($data);

    return redirect()->route('anggota.index');
}

public function destroy(Anggota $anggota)
{
    // Hapus foto dari folder public/foto
    if ($anggota->foto && file_exists(public_path('foto/' . $anggota->foto))) {
        unlink(public_path('foto/' . $anggota->foto));
    }

    // Hapus data dari database
    $anggota->delete();

    return redirect()->route('anggota.index');
}
}