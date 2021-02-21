<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Counter extends Component
{
    public $name='';


    public function render()
    {

            $results = User::where('name', 'LIKE', '%'.$this->name.'%')
                ->orWhere('email', 'LIKE', '%'.$this->name.'%')
                ->get();

        return view('livewire.counter', [ 'users' => $results ]);
    }
}
