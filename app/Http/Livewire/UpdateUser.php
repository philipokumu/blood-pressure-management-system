<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UpdateUser extends Component
{
    public $user_id = '';
    public $name = '';
    public $role = '';
    public $email = '';

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->role = $user->role;
        $this->email = $user->email; 
    }

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function update()
    {
        $this->validate();

        $user = User::find($this->user_id);

        $user->update(['name'=> $this->name]);

        redirect(route('users.list'));
    }

    public function render()
    {
        return view('livewire.update-user');
    }
}
