{{-- <x-livewire-tables::table.cell> --}}
{{-- Note: This is a tailwind cell --}}
{{-- For bootstrap 4, use <x-livewire-tables::bs4.table.cell> --}}
{{-- For bootstrap 5, use <x-livewire-tables::bs5.table.cell> --}}
{{-- </x-livewire-tables::table.cell> --}}

<x-livewire-tables::table.cell>
    {{ ucfirst($row->name) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->email }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->role }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->created_at }}
</x-livewire-tables::table.cell>