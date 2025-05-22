<?php

namespace App\Livewire\Settings;


use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DepartmentAssignView extends Component
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


    //created

    public $createdUniversity;
    public $createdFaculty;
    public $createdDepartment;

    public function addNewDepartment()
    {
        // Validation
        if (!$this->createdUniversity || !$this->createdFaculty || !$this->createdDepartment) {
            session()->flash('error', 'All fields are required to add a new department.');
            return;
        }

        // Check if department already exists
        $exists = Department::where('university', $this->createdUniversity)
            ->where('faculty', $this->createdFaculty)
            ->where('name', $this->createdDepartment)
            ->exists();

        if ($exists) {
            session()->flash('error', 'This department already exists.');
            return;
        }

        // Create new department
        $department= Department::create([
            'name' => $this->createdDepartment,
            'faculty' => $this->createdFaculty,
            'university' => $this->createdUniversity,
            'status' => 'pending', // You can change to 'accepted' if instant approval is needed
        ]);

        session()->flash('message', 'New department added successfully. You can now select it.');
        $this->reset(['createdUniversity', 'createdFaculty', 'createdDepartment']);
        $this->universities = Department::select('university')->distinct()->pluck('university')->toArray();


        $user = $this->currentUser;
        $user->department_id = $department->id;
        $user->status = 'pending'; 
        $user->save();
    }

    public function render()
    {
        return view('livewire.settings.department-assign-view');
    }
}
