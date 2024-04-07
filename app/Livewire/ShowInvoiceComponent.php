<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\TutoringSession;
use Illuminate\Auth\Access\AuthorizationException;

class ShowInvoiceComponent extends Component
{
    use HasTable;

    public $user;
    public $tutoringSessions;


    public function markAllAsPaid()
    {
        $this->user->tutoringSessions()->where('paid', null)->update(['paid' => true]);
        return redirect()->route('invoices.show', $this->user);

    }

    public function mount(User $user)
    {
        if (! auth()->user()->isAdmin() && ! $user->is(auth()->user())) {
            throw new AuthorizationException('You are not authorized to view this page.');
        }
        
        $this->user = $user;
        $this->tutoringSessions = $user->tutoringSessions()->where('paid', null)->get();
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('invoices.index')->extends('layouts.app');
    }
}
