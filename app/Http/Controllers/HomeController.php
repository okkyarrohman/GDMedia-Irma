<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Notifikasi;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\User;
use App\Models\UserSubmateri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function guru()
    {
        $users = User::where('role', 'murid')->get();

        $notifikasis = Notifikasi::where('oleh', 'Murid')->latest()->take(3)->get();

        return view('guru.dashboard', compact('users', 'notifikasis'));
    }

    public function murid()
    {
        $materis = Materi::with(['submateri.status_murid'])->get();

        $tugases = Tugas::with(['subtugas.tugas_answer'])->get();

        $userMateris = UserSubmateri::with(['submateri.materi'])->latest('updated_at')->first();

        $answers = TugasAnswer::with(['subtugas.tugas'])->latest('updated_at')->first();

        $notifikasis = Notifikasi::where('oleh', 'Guru')->latest()->take(3)->get();

        return view('murid.dashboard', compact('materis', 'tugases', 'userMateris', 'answers', 'notifikasis'));
    }
}
