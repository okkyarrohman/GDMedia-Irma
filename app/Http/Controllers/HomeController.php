<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Materi;
use App\Models\Notifikasi;
use App\Models\Submateri;
use App\Models\Subtugas;
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

        $absens = Absen::latest()->take(1)->first();

        $notifikasis = Notifikasi::where('oleh', 'murid')->latest()->take(3)->get();

        $pengumumans = Notifikasi::where('type', 'pengumuman')->with(['users'])->latest()->take(1)->first();

        return view('guru.dashboard', compact('users', 'notifikasis', 'absens', 'pengumumans'));
    }

    public function murid()
    {
        $materis = Materi::with(['submateri.status_murid'])->get();

        $submateris = Submateri::with(['materi', 'status_murid'])->get();

        $tugases = Tugas::with(['subtugas.tugas_answer'])->get();

        $subtugases = Subtugas::with(['tugas_answer', 'tugas'])->get();

        $answerAlls = TugasAnswer::with(['subtugas.tugas'])->get();

        $userMateris = UserSubmateri::where('user_id', auth()->user()->id)->with(['submateri.materi'])->latest('updated_at')->first();

        $answers = TugasAnswer::where('user_id', auth()->user()->id)->with(['subtugas.tugas'])->latest('updated_at')->first();

        $notifikasis = Notifikasi::where('oleh', 'guru')->where('type', 'notifikasi')->latest()->take(3)->get();

        $pengumumans = Notifikasi::where('type', 'pengumuman')->with(['users'])->latest()->take(1)->first();

        $absens = Absen::latest()->take(1)->first();

        return view('murid.dashboard', compact('materis', 'submateris', 'tugases', 'userMateris', 'answers', 'notifikasis', 'pengumumans', 'subtugases', 'answerAlls', 'absens'));
    }
}
