<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswas = Siswa::with('kelas')->latest()->get();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $kelas = Kelas::all();

    return view('siswa.create', compact('kelas'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $request->validate([
            'nama'           => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'kelas'           => 'required|string|max:255',
            'alamat'              => 'required|string',
            'jenis_kelamin'       => 'required|in:Pria,Wanita',
            
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama'           => 'required|string|max:255',
            'kelas'           => 'required|string|max:255',
            'alamat'              => 'required|string',
            'jenis_kelamin'       => 'required|in:Pria,Wanita',
           
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil dihapus!');
    }
}
