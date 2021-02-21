<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CursSearch extends Component
{
    public $title = '';

    public function render()
    {
        if (Auth::user()->role_id == 1)
        {
            $results = Course::where('title', 'LIKE', '%'.$this->title.'%')
                ->orWhere('code', 'LIKE', '%'.$this->title.'%')
                ->get();
        }else {
            $results = Course::where([
                ['title', 'LIKE', '%'.$this->title.'%'],
                ['user_id' ,'=' , Auth::user()->id]
            ])
                ->orWhere([
                    ['code', 'LIKE', '%'.$this->title.'%'],
                    ['user_id' ,'=' , Auth::user()->id]
                    ])
                ->get();

        }



        return view('livewire.curs-search', [ 'courses' => $results]);
    }
}
