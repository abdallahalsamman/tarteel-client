<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Mail\InvitationMail;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\AppServiceProvider;

class CreateUserComponent extends Component
{
    public UserForm $form;

    /** @var \App\Models\User */
    public $user;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $roles;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $parents;

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->roles = Role::orderBy('name')->get();

        $this->parents = User::whereHas('role', function ($query) {
            $query->where('name', Role::PARENT);
        })->orderBy('name')->get();

        return view('users.create')
            ->extends('layouts.app');
    }

    /**
     * Store new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->form->store();
        
        msg_success('User has been successfully created.');

        // Mail::to($user)
        //     ->queue(new InvitationMail($user, Carbon::tomorrow()));

        return redirect()->route('users.index');
    }
}
