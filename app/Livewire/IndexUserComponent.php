<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class IndexUserComponent extends Component
{
    use HasTable;

    /** @var string */
    public $sortField = 'created_at';

    /** @var string */
    public $roleId = '';

    /** @var array */
    protected $queryString = [
        'perPage',
        'sortField',
        'sortDirection',
        'search',
        'roleId',
    ];

    /** @var array */
    protected $listeners = ['entity-deleted' => 'render'];

    public function mount()
    {
        $this->perPage = 999999;
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $users = User::with('role')
            ->filter([
                'orderByField' => [$this->sortField, $this->sortDirection],
                'search' => $this->search,
                'roleId' => $this->roleId,
            ])->paginate($this->perPage);

        $roles = Role::orderBy('name')->get();

        return view('users.index', ['users' => $users, 'roles' => $roles])
            ->extends('layouts.app');
    }

    /**
     * Reset pagination back to page one if search query is changed.
     *
     * @return void
     */
    public function updatedSearch()
    {
        $this->resetPage();
    }

    /**
     * Reset pagination back to page one if roleId query is changed.
     *
     * @return void
     */
    public function updatedRoleId()
    {
        $this->resetPage();
    }
}
