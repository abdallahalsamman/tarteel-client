<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use Illuminate\Auth\Access\AuthorizationException;

class EditUserComponent extends Component
{
    public UserForm $form;

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
        $this->form->setUser($user);

        // if ($this->user->isHimself(auth()->user())) {
        //     throw new AuthorizationException();
        // }

        $this->roles = Role::orderBy('name')->get();
        
        $this->parents = User::whereHas('role', function ($query) {
            $query->where('name', Role::PARENT);
        })->orderBy('name')->get();
    }

    public function update()
    {
        $this->form->update();

        msg_success('User has been successfully updated.');

        return redirect()->route('users.index');
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
}
