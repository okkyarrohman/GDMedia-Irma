<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Submateri;
use Illuminate\Http\Request;

class MateriMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::with(['submateri', 'submateri.status_murid'])->get();

        return view('murid.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $materis = Materi::find($id)->first();
        $submateris = Submateri::where('materi_id', $id)->with(['materi', 'status_murid'])->get();


        return view('murid.materi.show', compact('submateris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
