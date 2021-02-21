<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LecSearch extends Component
{
    public function render()
    {
        $results = Course::where('title', 'LIKE', '%'.$this->title.'%')
            ->orWhere('code', 'LIKE', '%'.$this->title.'%')
            ->get();

        return view('livewire.lec-search');
    }
}
