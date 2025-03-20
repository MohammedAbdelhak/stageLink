<?php

namespace App\Livewire\Student;

use App\Models\Internship;
use Livewire\Component;

class InternshipPage extends Component
{

   
    public $internship;

    public function mount($id)
    {
        $this->internship = Internship::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.student.internship-page', [
            'internship' => $this->internship,
        ]);
    }

}
