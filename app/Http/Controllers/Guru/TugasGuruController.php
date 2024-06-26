<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::with(['subtugas'])->get();

        return view('guru.tugas.index', compact('tugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tugases = Tugas::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'deadline' => $request->input('deadline'),
        ]);

        $notifikasis = Notifikasi::create([
            'pesan' => auth()->user()->name . ' Telah Memposting Tugas Baru!',
            'oleh' => 'Guru'
        ]);

        return redirect()->route('tugas-guru.index')->with('success', 'Data tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::where('id', $id)->with(['subtugas'])->first();

        return view('guru.tugas.show', compact('tugases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugases = Tugas::where('id', $id)->with(['subtugas'])->first();

        return view('guru.tugas.edit', compact('tugases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tugases = Tugas::find($id);
        $tugases->name = $request->name;
        $tugases->save();

        return redirect()->route('tugas-guru.index')->with('success', 'Data tugas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugases = Tugas::find($id);
        $tugases->delete();

        return redirect()->route('tugas-guru.index')->with('success', 'Data tugas berhasil dihapus');
    }
}
