<?php

namespace App\Livewire;

use App\Models\TutoringSession;
use Illuminate\Auth\Access\AuthorizationException;
use Livewire\Component;

class IndexInvoiceComponent extends Component
{
    use HasTable;

    public $tutoringSessions;

    public function mount()
    {
        if (! auth()->user()->isAdmin()) {
            throw new AuthorizationException('You are not authorized to view this page.');
        }

        $this->tutoringSessions = TutoringSession::wherePaid(null)->get();
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
