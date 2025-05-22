<?php

namespace App\Livewire\Settings;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentAssignView extends Component
{

    public $currentUser;


    public $university;
    public function updatedUniversity()
    {  
        $this->faculty = null;
        $this->department = null;

        $this->faculties = Department::where('university', $this->university)
            ->select('faculty')->distinct()->pluck('faculty')->toArray();

        $this->departments = [];
    }
    public $faculty;

    public function updatedFaculty()
    {
        $this->department = null;

        $this->departments = Department::where('university', $this->university)
            ->where('faculty', $this->faculty)
            ->select('name')->pluck('name')->toArray();
    }

    public $department;
    
    public $universities = [];
    public $faculties = [];
    public $departments = [];

    public function mount()
    {   
        $this->universities = Department::select('university')->distinct()->pluck('university')->toArray();

        $user = Auth::user();
        $this->currentUser  = $user;
        if ($user->status !== 'unassigned' && $user->department) {
            $this->university = $user->department->university;
            $this->faculty = $user->department->faculty;
            $this->department = $user->department->name;

            $this->faculties = Department::where('university', $this->university)
                ->select('faculty')->distinct()->pluck('faculty')->toArray();

            $this->departments = Department::where('university', $this->university)
                ->where('faculty', $this->faculty)
                ->select('name')->pluck('name')->toArray();
        }
    }

    public function render()
    {       

        return view('livewire.settings.student-assign-view');
    }


    public function submitAssignment()
    {

      
        $this->validate([
            'university' => 'required|string',
            'faculty' => 'required|string',
            'department' => 'required|string',
        ]);

        $department = Department::where('university', $this->university)
            ->where('faculty', $this->faculty)
            ->where('name', $this->department)
            ->first();

        if ($department) {
            Auth::user()->update(['department_id' => $department->id, 'status' => 'pending']);

            session()->flash('message', 'University assignment submitted successfully!');
        } else {
            session()->flash('error', 'Invalid department selection.');
        }
    }
}
