<div>
    <x-slot name="header">
        <div class="flex md:justify-between flex-col md:flex-row">
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Patient details') }}
                </h2>
            </div>
            <div class="mt-4 flex flex-col md:flex-row">
                <a href="{{route('pressures.list',$patient_id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4 mb-2 md:mb-0 w-52">
                    View Blood pressure
                </a>
                <a href="{{route('pressures.create',$patient_id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-52">
                    Create Blood Pressure
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white p-6 rounded shadow mt-4">
                        <form wire:submit.prevent="update" method="POST">
                            <div class="flex flex-col">
                                <div class="sm:w-1/4 mb-6">
                                    <h2 class="text-xl">Patient {{$patient_number}}</h2>
                                </div>
                                <div class="sm:w-3/4 grid grid-cols-1 gap-6">
                                    <div>
                                        <label class="block">
                                            <span class="text-gray-700">Name</span>
                                        </label>
                                            <input
                                                name="name"
                                                wire:model="name"
                                                class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                                type="text">
                                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                   <div>
                                    <label class="block">
                                        <span class="text-gray-700">Patient number</span>
                                    </label>
                                        <input
                                            name="patient_number"
                                            readonly
                                            wire:model="patient_number"
                                            class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                            type="text">
                                   </div>
                                </div>
                                <div class="mt-2">
                                    <button class="mt-2 mr-2 px-3 py-1 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded" type="submit">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
