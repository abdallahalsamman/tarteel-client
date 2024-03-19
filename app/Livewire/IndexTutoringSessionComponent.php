<?php

namespace App\Livewire;

use App\Models\TutoringSession;
use Livewire\Component;

class IndexTutoringSessionComponent extends Component
{
    use HasTable;

    /** @var string */
    public $sortField = '';

    // index-review
    /** @var array */
    protected $queryString = ['perPage', 'sortField', 'sortDirection', 'search'];

    /** @var array */
    protected $allowedRoles = [];

    /** @var array */
    protected $listeners = ['entity-deleted' => 'render'];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // index-review-5
        $tutoringsessions = TutoringSession::filter([
            'search' => $this->search,
            'orderByField' => [$this->sortField, $this->sortDirection],
        ])->paginate($this->perPage);

        return view('tutoring-sessions.index', ['tutoringSessions' => $tutoringsessions])
            ->extends('layouts.app');
    }
}
