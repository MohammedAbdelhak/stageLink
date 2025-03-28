<?php

namespace App\Livewire\Pages;

use App\Livewire\Tables\AbstractPaginationTable;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Internship;
use Illuminate\Support\Facades\Auth;

class InternshipsTable extends AbstractPaginationTable
{
    protected function fetchData(): LengthAwarePaginator
    {
        $user = Auth::user();

        switch ($user->type) {
            case 'Student':
                return Internship::where('department_id', $user->department->id)->with('company')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;

            case 'Company':
                return Internship::where('company_id', $user->company->id)->with('department')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;
            case 'Department':
                return Internship::where('department_id', $user->department->id)->with('department')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;
            default:
                return Internship::with('company')->with('department')->paginate(
                    $this->perPage,
                    ['*'],
                    'page',
                    $this->currentPage
                );
                break;
        }
    }

    public function render()
    {

        $user = Auth::user();

        switch ($user->type) {
            case 'Student':
                return view('livewire.student.internships', [
                    'data' => $this->fetchData(),
                ]);
                break;

            case 'Company':
                return view('livewire.company.internships', [
                    'data' => $this->fetchData(),
                ]);
                break;

            case 'Department':
                return view('livewire.department.internships', [
                    'data' => $this->fetchData(),
                ]);
                break;

            default:
                return view('livewire.admin.internships', [
                    'data' => $this->fetchData(),
                ]);
                break;
        }
    }
}
