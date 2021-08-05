<?php

namespace Tests\Feature;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Livewire\AllUsers;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\UpdateUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_user_can_create_new_user()
    {

        $this->assertDatabaseCount('users',0);

        $name = 'foo bar';
        $email = 'foo@barbara.com';
        $password = 'password';
        $role = 'nurse';

        $response = Livewire::actingAs($superAdmin = User::factory()->create())
            ->test(CreateUser::class)
            ->set('state', [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password,
                'role' => $role,
                ])
            ->call('create');
            // ->assertStatus(201);

            $user = User::where('id','!=',$superAdmin->id)->first();

            $this->assertEquals($name, $user->name);
            $this->assertEquals($email, $user->email);
            $this->assertEquals($role, $user->role);

        $this->assertDatabaseCount('users',2);
        
    }


    public function test_user_can_update_user_info()
    {

        $userOldInfo = User::factory()->create();
        $newName = 'George';

        Livewire::actingAs(User::factory()->create())
            ->test(UpdateUser::class,['id' => $userOldInfo->id])
            ->set('state', [
                'name' => $newName,
                ])
            ->call('update',$userOldInfo->id);
            // ->assertRedirect(route('patients'));

            $user = User::first();
    
            $this->assertEquals($newName, $user->name);
            $this->assertEquals($userOldInfo->id, $user->id);
    }


    public function test_user_can_view_user_list()
    {

        $users = User::factory(2)->create();

        Livewire::actingAs(User::factory()->create())
            ->test(AllUsers::class,['users' => $users])
            // ->call('index')
            ->assertStatus(200);
    }
}
