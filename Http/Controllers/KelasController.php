<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        
        $kelas = Kelas::with('siswa')->latest()->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $siswas = Siswa::all(); 
        return view('kelas.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas'    => 'required|string|max:255',
            'jurusan'    => 'required|string|max:255',
            'wali_kelas'    => 'required|string|max:255',
         
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswas = Siswa::all();
        return view('siswa.edit', compact('kelas', 'siswas'));
    }

    public function update(Request $request, string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'kelas'    => 'required|string|max:255',
            'jurusan'    => 'required|string|max:255',
            'wali_kelas'    => 'required|string|max:255',
           
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'kelas berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}