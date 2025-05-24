<?php

namespace App\Livewire\Admin;

use App\Livewire\Tables\AbstractPaginationTable;
use App\Models\Company;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class Companies extends AbstractPaginationTable
{

   


    public function fetchData(): LengthAwarePaginator
    {
        return Company::orderBy('created_at', 'desc')->paginate(
            $this->perPage,
            ['*'],
            'page',
            $this->currentPage
        );

        
         
    }

    public function acceptCompany($id){

        $company = Company::where('id' , $id)->first();

        $company->status = "accepted";
        $company->save();
    }



    public function refuseCompany($id){

        $company = Company::where('id' , $id)->first();

        $company->delete();

        User::where('company_id', $id)->update(['company_id' => null]);
    
    }


    public function render()
    {
        return view('livewire.admin.companies' , ['data' => $this->fetchData()]);
    }
}
