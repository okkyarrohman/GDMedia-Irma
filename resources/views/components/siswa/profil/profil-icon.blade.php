<a href="{{ auth()->user()->role == 'murid' ? route('profil.edit') : route('profil-guru.edit') }}"
    class="size-14 rounded-full overflow-hidden">
    @if (auth()->user()->foto == null)
        <img src="{{ asset('assets/profil-icon.jpg') }}" alt="Profil Icon" class="w-full h-full">
    @else
        <img src="{{ asset('storage/profile/foto/' . auth()->user()->foto) }}" alt="Profil Icon" class="w-full h-full">
    @endif

</a>
