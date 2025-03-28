<?php

namespace App\Livewire\Pages;

use App\Models\Internship;
use App\Services\MembersService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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


    public function confirmApplication()
    {
        $student = Auth::user();

        $memberService = new MembersService();
        $memberService->addStudentToInternship($student, $this->internship);

        return redirect('applications');
    }
}
