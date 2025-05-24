<?php

namespace App\Livewire\Admin;

use App\Livewire\Tables\AbstractPaginationTable;
use App\Models\Department;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class Departments extends AbstractPaginationTable
{

   


    public function fetchData(): LengthAwarePaginator
    {
        return Department::orderBy('created_at', 'desc')->paginate(
            $this->perPage,
            ['*'],
            'page',
            $this->currentPage
        );

        
         
    }

    public function acceptDepartment($id){

        $department = Department::where('id' , $id)->first();

        $department->status = "accepted";
        $department->save();


        User::where('department_id', $id)->update(['status' => 'active']);

    }



    public function refuseDepartment($id){

        $department = Department::where('id' , $id)->first();

        $department->delete();

        User::where('department_id', $id)->update(['department_id' => null , 'status' => 'unassigned']);
    
    }

    public function render()
    {
        return view('livewire.admin.departments' , [
            'data' => $this->fetchData()
        ]);
    }
}
