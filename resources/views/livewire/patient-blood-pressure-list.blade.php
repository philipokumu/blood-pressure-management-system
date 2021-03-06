<div>
    <x-slot name="header">
        <div class="flex md:justify-between flex-col md:flex-row">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Blood pressure records for patient') }} {{$state['patient_number']}}
                </h2>
                <h3>
                    {{ __('Click record to adjust blood pressure') }}
                </h3>
            </div>
            <div class="mt-4 flex flex-col md:flex-row">
                <a href="{{route('pressures.export',$state['patient_id'])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4 w-36">
                    Download list
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <livewire:blood-pressure-table :patient="$state['patient_id']"/>
            </div>
        </div>
    </div>
</div>
