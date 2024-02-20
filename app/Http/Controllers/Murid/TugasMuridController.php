<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugases = Tugas::all();

        return view('murid.tugas.index', compact('tugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('murid.tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TugasResult::create([
            'tugas_id' => $request->input('tugas_id'),
            'user_id' => Auth::user()->id,
            'answer1' => $request->input('answer1'),
        ]);

        return redirect()->route('tugas.index')->with('success', 'Berhasil mengirimkan tugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::find($id);

        return view('murid.tugas.show', compact('tugases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugases = Tugas::find($id);
        $tugasResults = TugasResult::with('tugas')->first();

        return view('murid.tugas.edit', compact('tugases', 'tugasResults'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tugasResults = TugasResult::find($id);
        $tugasResults->user_id = Auth::user()->id;
        $tugasResults->tugas_id = $request->tugas_id;
        $tugasResults->answer1 = $request->answer1;

        $tugasResults->save();

        return redirect()->route('tugas.index')->with('success', 'jawaban tugas berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}