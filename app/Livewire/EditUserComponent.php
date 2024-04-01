<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditUserComponent extends Component
{
    

    /** @var \App\Models\User */
    public $user;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $roles;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $parents;

    
    /**
     * Component mount.
     *
     * @return void
     */
    public function mount(User $user)
    {
        $this->user = $user->toArray();

        // if ($this->user->isHimself(auth()->user())) {
        //     throw new AuthorizationException();
        // }

        $this->roles = Role::orderBy('name')->get();
        
        $this->parents = User::whereHas('role', function ($query) {
            $query->where('name', Role::PARENT);
        })->orderBy('name')->get();
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('users.edit')
            ->extends('layouts.app');
    }

    /**
     * Update existing user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $studentRoleId = \App\Models\Role::where('name', \App\Models\Role::STUDENT)->first()->id;

        if ($this->user->role_id != $studentRoleId) {
            $this->user->parent_id = null; // Reset parent_id
        }

        $this->validate($this->rules());

        $this->user->save();

        msg_success('User has been successfully updated.');

        return redirect()->route('users.index');
    }
}
