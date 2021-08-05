<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update blood pressure record for patient ') }} {{$patient_number}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white p-6 rounded shadow mt-4">
                    <div class="mt-4">
                        <form wire:submit.prevent="update" method="POST">
                            @csrf
                            <div class="flex flex-col sm:flex-row">
                                <div class="sm:w-3/4 grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <label class="block">
                                        <span class="text-gray-700">Blood pressure <b>(mm Hg)</b></span>
                                    </label>
                                        <input
                                            wire:model="blood_pressure" 
                                            class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                            type="text"> 
                                    @error('blood_pressure') <span class="text-red-500">{{ $message }}</span> @enderror
                                   
                                </div>
                                <div class="mt-2 block">
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
</div>
