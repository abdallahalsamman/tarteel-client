<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Mail\InvitationMail;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\AppServiceProvider;

class CreateUserComponent extends Component
{
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
        $studentRoleId = \App\Models\Role::where('name', \App\Models\Role::STUDENT)->first()->id;

        if ($this->user['role_id'] != $studentRoleId) {
            $this->user['parent_id'] = null; // Reset parent_id
        }

        $this->validate();

        User::create([
            'name' => $this->user['name'],
            'phone_number' => $this->user['phone_number'],
            'email' => $this->user['email'],
            'role_id' => $this->user['role_id'],
            'parent_id' => $this->user['parent_id'],
            'password' => Hash::make('password'), // Added default password
            AppServiceProvider::OWNER_FIELD => auth()->id(),
        ]);
        msg_success('User has been successfully created.');

        // Mail::to($user)
        //     ->queue(new InvitationMail($user, Carbon::tomorrow()));

        return redirect()->route('users.index');
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'user.name' => [
                'required',
            ],
            'user.phone_number' => [
                'required',
                'numeric'
            ],
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'user.role_id' => [
                'required',
                Rule::exists('roles', 'id'),
            ],
            'user.parent_id' => [
                Rule::requiredIf(function () {
                    return $this->user['role_id'] == Role::where('name', Role::STUDENT)->first()->id;
                }),
                'nullable',
                Rule::exists('users', 'id')->where(function ($query) {
                    $query->where('role_id', Role::where('name', Role::PARENT)->first()->id);
                }),
            ],
        ];
    }
}
