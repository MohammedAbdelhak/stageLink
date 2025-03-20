<?php

namespace App\Livewire\Student;

use App\Livewire\Tables\AbstractPaginationTable;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Internship;

class InternshipsTable extends AbstractPaginationTable
{
    protected function fetchData(): LengthAwarePaginator
    {
        return Internship::with('company')->paginate(
            $this->perPage,
            ['*'],
            'page',
            $this->currentPage
        );
    }

    public function render()
    {
        return view('livewire.student.internships', [
            'data' => $this->fetchData(),
        ]);
    }
}
