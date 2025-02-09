<?php

namespace App\Livewire;

use Illuminate\Auth\Access\AuthorizationException;
use Livewire\Component;

class DeleteUserComponent extends Component
{
    use CanFlash;

    /** @var \App\Models\User */
    public $user;

    public function render()
    {
        return view('users.delete');
    }

    /**
     * Delete user.
     *
     * @return void
     */
    public function destroy()
    {
        if (auth()->user()->isHimself($this->user)) {
            throw new AuthorizationException();
        }

        $this->user->delete();

        $this->dispatchFlashSuccessEvent('User has been successfully deleted.');

        $this->dispatch('entity-deleted');
    }
}
