<?php

namespace App\Livewire\Admin;

use App\Livewire\Tables\AbstractPaginationTable;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class Accounts extends AbstractPaginationTable
{


    public $filter = 'all';

    public function updatedFilter()
    {
        $this->currentPage = 1;
    }

    public function fetchData(): LengthAwarePaginator
    {
        $query = User::query()->where('type', '!=', 'Admin')->orderBy('created_at', 'desc');

        if ($this->filter !== 'all') {
            $query->where('type', $this->filter);
        }

        return $query->paginate(
            $this->perPage,
            ['*'],
            'page',
            $this->currentPage
        );
    }

    public function deactivateAccount($id){

        $user = User::where('id' , $id)->first();

        $user->status = "pending";
        $user->save();
    }



    public function activateAccount($id){

        $user = User::where('id' , $id)->first();

        $user->status = "active";
        $user->save();
    }
    
    public function render()
    {
        return view('livewire.admin.accounts', [
            'data' => $this->fetchData()
        ]);
    }
}
