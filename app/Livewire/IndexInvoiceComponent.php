<?php

namespace App\Livewire;

use App\Models\TutoringSession;
use Livewire\Component;

class IndexInvoiceComponent extends Component
{
    use HasTable;

    /** @var string */
    public $sortField = '';

    // index-review
    /** @var array */
    protected $queryString = ['perPage', 'sortField', 'sortDirection', 'search'];

    public function mount()
    {
        $this->perPage = 999;
        $this->sortField = 'session_date';
        $this->sortDirection = 'desc';
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $user = auth()->user();
        if ($user->isAdmin()) {
            $tutoringSessions = TutoringSession::filter([
                'search' => $this->search,
                'orderByField' => [$this->sortField, $this->sortDirection],
            ])->paginate($this->perPage);
        } else {
            $tutoringSessions = $user->tutoringSessions()->filter([
                'search' => $this->search,
                'orderByField' => [$this->sortField, $this->sortDirection],
            ])->paginate($this->perPage);
        }

        $tutoringSessions->where('paid', null);

        return view('invoices.index', ['tutoringSessions' => $tutoringSessions])
            ->extends('layouts.app');
    }
}
