<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;

class PatientTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('#','id')
                ->sortable()
                ->searchable(),
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('Patient Number', 'patient_number')
                ->sortable()
                ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Patient::query();
    }

    public function getTableRowUrl($row): string
    {
    return route('patients.edit', $row);
    }

    // public function rowView(): string
    // {
    //     return 'livewire-tables.rows.patient_table';
    // }
}
