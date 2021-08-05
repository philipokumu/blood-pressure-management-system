<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All patients') }}
        </h2>
        <h3>
            {{ __('Click on any patient to view their blood pressure details') }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <livewire:patient-table />
            </div>
        </div>
    </div>

</div>
