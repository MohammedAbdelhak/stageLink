<?php

namespace App\Livewire;

use App\Livewire\Tables\AbstractPaginationTable;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AccountsPage extends AbstractPaginationTable
{
    public $accounts;
    public $currentUser;

    public function mount()
    {
        $this->currentUser = Auth::user();
        switch ($this->currentUser->type) {

            case 'Company':
                $this->accounts = User::where('type', 'Company')->where('company_id', $this->currentUser->company_id)->orderBy("created_at", 'Desc')->get();
                break;
            case 'Department':
                $this->accounts = User::where('department_id', $this->currentUser->department_id)->orderBy("created_at", 'Desc')->get();

                break;
        }
    }

    protected function fetchData(): LengthAwarePaginator
    {
        $user = Auth::user();
        switch ($user->type) {
            case 'Company':
                return User::where('type', 'Company')->where('company_id', $this->currentUser->company_id)->orderBy("created_at", 'Desc')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;
            case 'Department':
                return User::where('department_id', $this->currentUser->department_id)->orderBy("created_at", 'Desc')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );

                break;
            default:
                return User::where('department_id', $this->currentUser->department_id)->orderBy("created_at", 'Desc')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );

                break;
        }


        // switch ($user->type) {

        //     case 'Student':
        //         return Member::where('student_id', $user->id)->with('company')->with('internship')->paginate(
        //             $this->perPage,
        //             ['*'],
        //             'page',
        //             $this->currentPage
        //         );
        //         break;
        //     case 'Company':
        //         return Member::where('company_id', $user->company_id)->with('student')->with('internship')->paginate(
        //             $this->perPage,
        //             ['*'],
        //             'page',
        //             $this->currentPage
        //         );

        //         break;


        //     default:
        //         return Member::where('department_id', $user->department_id)->where('status', 'accepted')->with('student')->with('internship')->with('company')->paginate(
        //             $this->perPage,
        //             ['*'],
        //             'page',
        //             $this->currentPage
        //         );
        //         break;
        // }
    }


    public function assign($id)
    {
        $account = User::find($id);

        if (!$account) {
            session()->flash('error', 'Account not found.');
            return;
        }

        $account->status = 'active';
        $account->save();

        session()->flash('message', 'Account assigned successfully.');
    }

    public function unassign($id)
    {
        $account = User::find($id);

        if (!$account) {
            session()->flash('error', 'Account not found.');
            return;
        }

        $account->status = 'unassigned';
        switch ($this->currentUser->type) {

            case 'Company':
                $account->company_id  = null;
                break;
            case 'Department':
                $account->department_id  = null;

                break;
        }
        $account->save();

        session()->flash('message', 'Account unassigned successfully.');
    }


    public function render()
    {
        return view('livewire.accounts-page', [
            'data' => $this->fetchData(),
        ]);
    }
}
