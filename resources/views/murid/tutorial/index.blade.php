@extends('layouts.siswaLayout')

@section('content')
<div class="flex justify-between items-center pb-6 mb-6 border-b-2 border-b-abu-400">
    <x-title title="Kamus Tutorial" />
    <div class="flex items-center gap-3">
        <x-siswa.search-bar :route="route('tutorial.index')" />
        <a href="{{ route('tutorial-tersimpan.index') }}" class="flex items-center gap-1 bg-hijau rounded-xl text-white text-lg font-semibold px-8 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="24" viewBox="0 0 15 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 23.3331L7.5 18.1902L0 23.3331V0.547363H15V23.3331ZM7.5 16.4759L13.5714 20.6188V1.97593H1.42857V20.6188L7.5 16.4759Z" fill="white"/>
            </svg>
            Tersimpan
        </a>
        <x-siswa.profil.profil-icon />
    </div>
</div>

<div class="grid grid-cols-3 gap-6">
    @foreach ($tutorials as $tutorial)

        @php
            $status = $tutorial->status_tersimpan->where('user_id', auth()->user()->id)->first();
        @endphp

        <x-siswa.tutorial.tutorial-card :id="$tutorial->id" :nama="$tutorial->nama" :sumber="$tutorial->sumber" :cover="$tutorial->cover" :status="$status ? $status->is_saved : 'N'" :idstatus="$status ? $status->id : ''" />
    @endforeach
</div>

<script>
    console.log(@json($tutorials))
</script>
@endsection