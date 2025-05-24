<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PendingView extends Component
{


    public function mount()
    {
        if (Auth::user()->status != 'pending') {
            return redirect('/dashboard');
        }
    }

    
    public function render()
    {
        return view('livewire.pending-view');
    }
}
