<?php

namespace App\Livewire;

use App\Models\Internship;
use App\Models\Company;
use App\Models\Department;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class InternshipsTable extends DataTableComponent
{
    protected $model = Internship::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Description')
                ->format(fn($value, $row) => str()->limit($row->description, 50))
                ->collapseOnTablet(),

            Column::make('N° Places', 'places_available')
                ->sortable(),

                Column::make('Company' , 'company.name')
                ->sortable()
                ->searchable(),

            Column::make('Department' , 'department.name')
                ->format(fn($value, $row) => $row->department->name ?? 'N/A')
                ->sortable()
                ->searchable(),

            Column::make('Created At', 'created_at')
                ->sortable()
                ->format(fn($value) => $value->format('Y-m-d')),
        ];
    }
}
