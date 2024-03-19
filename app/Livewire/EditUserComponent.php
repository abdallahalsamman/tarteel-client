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
    public User $user;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $roles;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $parents;

    /**
     * Component mount.
     *
     * @return void
     */
    public function mount()
    {
        if ($this->user->isHimself(auth()->user())) {
            throw new AuthorizationException();
        }
    }

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
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            'user.role_id' => [
                'required',
                'exists:roles,id',
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
