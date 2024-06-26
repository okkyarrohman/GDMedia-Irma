<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Submateri;
use Illuminate\Http\Request;

class SubmateriMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $submateris = Submateri::where('materi_id', $id)->with(['materi', 'status_murid'])->get();

        return view('murid.submateri.index', compact('submateris'));
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
        $submateris = Submateri::where('id', $id)->with(['materi', 'status_murid'])->first();

        // dd($submateris);

        return view('murid.submateri.show', compact('submateris'));
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
