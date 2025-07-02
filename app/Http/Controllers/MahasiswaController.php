<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::query();

        // Fitur Pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('jurusan', 'like', '%' . $search . '%');
        }

        $mahasiswas = $query->paginate(10); // Menampilkan 10 data per halaman

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:255|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mahasiswas,email',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|string|max:255|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:mahasiswas,email,' . $mahasiswa->id,
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}