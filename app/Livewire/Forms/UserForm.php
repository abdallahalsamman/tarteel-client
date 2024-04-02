<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;


class UserForm extends Form
{
    public $user;

    public $name;
    public $phone_number;
    public $email;
    public $role_id;
    public $parent_id;
    public $password;

    public function setUser($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->phone_number = $user->phone_number;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $this->parent_id = $user->parent_id;
    }

    public function store()
    {
        $studentRoleId = \App\Models\Role::where('name', \App\Models\Role::STUDENT)->first()->id;

        if ($this->role_id != $studentRoleId) {
            $this->parent_id = null;
        }

        $this->validate();

        User::create([
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'parent_id' => $this->parent_id,
            'password' => Hash::make($this->password), // Added default password
        ]);
    }

    public function update()
    {        
        $this->validate();

        $studentRoleId = Role::where('name', Role::STUDENT)->first()->id;

        if ($this->user->role_id != $studentRoleId) {
            $this->user->parent_id = null;
        }

        $this->user->update(
            $this->except('user', 'password')
        );

        $this->user->save();
    }


    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'phone_number' => [
                'required',
                'numeric'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user?->id),
            ],
            'role_id' => [
                'required',
                'exists:roles,id',
            ],
            'parent_id' => [
                Rule::requiredIf(function () {
                    return $this->role_id == Role::where('name', Role::STUDENT)->first()->id;
                }),
                'nullable',
                Rule::exists('users', 'id')->where(function ($query) {
                    $query->where('role_id', Role::where('name', Role::PARENT)->first()->id);
                }),
            ]
        ];
    }
}
