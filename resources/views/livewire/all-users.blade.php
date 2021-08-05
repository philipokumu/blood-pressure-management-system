<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('All Users') }}
                </h2>
            </div>
            @if(auth()->user()->role=='admin')
            <div class="mt-4">
                <a href="{{route('users.export')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-4">
                    Download users list
                </a>
            </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                <livewire:user-table />
            </div>
        </div>
    </div>
</div>
