{{-- <x-app-layout> --}}
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User details') }}
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
                                    <div class="sm:w-1/4 mb-6">
                                        <h2 class="text-xl">Account details</h2>
                                    </div>
                                    <div class="sm:w-3/4 grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <label class="block">
                                            <span class="text-gray-700">Name</span>
                                        </label>
                                            <input
                                                name="name"
                                                wire:model="name"
                                                class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                                type="text">
                                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                                        <label class="block">
                                            <span class="text-gray-700">Email</span>
                                        </label>
                                            <input
                                                name="email"
                                                readonly
                                                wire:model="email"
                                                class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                                type="text">
                                        <label class="block">
                                            <span class="text-gray-700">Role</span>
                                        </label>
                                            <input
                                            name="role"
                                            readonly
                                            wire:model="role"
                                            class="form-input bg-gray-200 border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                            type="text">
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
    </div>
{{-- </x-app-layout> --}}