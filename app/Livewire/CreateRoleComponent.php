<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Rules\OwnerRestrictedRule;
use App\Rules\PermissionExistsRule;
use App\ViewModels\SaveRoleViewModel;

class CreateRoleComponent extends Component
{
    /** @var \App\Models\Role */
    public $role;

    /** @var \Illuminate\Database\Eloquent\Collection */
    public $permissions;

    /**
     * Component mount.
     *
     * @return void
     */
    public function mount()
    {
        $this->permissions = SaveRoleViewModel::buildRolePermissions();
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('roles.create', [
            'permissionGroups' => SaveRoleViewModel::groupPermissions($this->permissions),
        ])->extends('layouts.app');
    }

    /**
     * Store new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(null, [], $this->attributes());

        $role = Role::create([
            'name' => $this->role['name'],
            'label' => $this->role['label'],
        ]);

        $role->createPermissions($this->permissions);

        msg_success('Role has been successfully created.');

        return redirect()->route('roles.index');
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'role.name' => [
                'required',
                Rule::unique('roles', 'name'),
            ],
            'role.label' => [
                'required',
            ],
            'permissions.*.allowed' => [
                'boolean',
                new PermissionExistsRule(),
            ],
            'permissions.*.owner_restricted' => [
                'boolean',
                new OwnerRestrictedRule($this->permissions),
            ],
        ];
    }

    /**
     * Rename attributes.
     *
     * @return array
     */
    private function attributes()
    {
        $attributes = [];
        $iteration = 1;

        foreach ($this->permissions as $id => $permission) {
            $attributes["permissions.$id.allowed"] = "Permission in row $iteration";
            $attributes["permissions.$id.owner_restricted"] = "Owner Restricted in row $iteration";
            $iteration++;
        }

        return $attributes;
    }
}
