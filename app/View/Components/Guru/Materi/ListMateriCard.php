<?php

namespace App\View\Components\Guru\Materi;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListMateriCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $mapel,
        public string $id,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guru.materi.list-materi-card');
    }
}
