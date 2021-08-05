<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BloodPressure;
use App\Models\Patient;

class BloodPressureTable extends DataTableComponent
{

    public $state = [
        'blood_pressure' => '',
        'patient_id' => '',
    ];
    public function mount(Patient $patient)
    {
        $this->state['patient_id'] = $patient->id;
    }

    public function columns(): array
    {
        return [
            // Column::make('Name')
            //     ->sortable()
            //     ->searchable(),
            // Column::make('Patient id','patient_id')
            //     ->sortable()
            //     ->searchable(),
            Column::make('Blood Pressure', 'blood_pressure')
                ->sortable()
                ->searchable(),
            Column::make('Created', 'created_at')
            ->sortable()
            ->searchable(),
        ];
    }

    public function getTableRowUrl($row): string
    {
        $patient = Patient::find($row->patient_id);

        return route('pressures.edit', [$patient,$row]);
    }

    public function query(): Builder
    {
        $patient_id = $this->state['patient_id'];

        return BloodPressure::query()
            ->when($this->state['patient_id'], fn ($query, $patient_id) => $query->where('patient_id', $patient_id));
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.blood_pressure_table';
    }
}
