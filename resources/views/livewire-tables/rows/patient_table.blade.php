<div>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Patient details') }}
    </h2>
    <div class="mt-4">
        <a href="{{route('pressures.list',$state['patient_id'])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
            View Blood pressure
        </a>
        <a href="{{route('pressures.create',$state['patient_id'])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Blood Pressure
        </a>
    </div>
</x-slot>
<x-livewire-tables::table.cell class="flex justify-between">
{{-- Note: This is a tailwind cell --}}
{{-- For bootstrap 4, use <x-livewire-tables::bs4.table.cell> --}}
{{-- For bootstrap 5, use <x-livewire-tables::bs5.table.cell> --}}
</x-livewire-tables::table.cell>
</div>

