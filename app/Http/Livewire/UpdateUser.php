<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UpdateUser extends Component
{
    public $state = [
        'id' => '',
        'name' => '',
        'role' => '',
        'email' => '',
    ];

    public function mount(User $user)
    {
        $this->state['id'] = $user->id;
        $this->state['name'] = $user->name;
        $this->state['role'] = $user->role;
        $this->state['email'] = $user->email;
    }

    protected $rules = [
        'state.name' => 'required|min:6',
    ];

    public function update()
    {
        $this->validate();

        $user = User::find($this->state['id']);

        $user->update(['name'=> $this->state['name']]);

        redirect(route('users.list'));
    }

    public function render()
    {
        return view('livewire.update-user');
    }
}
