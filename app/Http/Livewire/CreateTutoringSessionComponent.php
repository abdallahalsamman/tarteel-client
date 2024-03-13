<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\TutoringSession;

class CreateTutoringSessionComponent extends Component
{
    /** @var \App\Models\TutoringSession */
    public $tutoringSession;
    public $tutors, $parents, $children;
    public $durations = [
        ['id' => 30, 'title' => '30 minutes'],
        ['id' => 60, 'title' => '1 hour'],
        ['id' => 90, 'title' => '1 hour 30 minutes'],
        ['id' => 120, 'title' => '2 hours'],
        ['id' => 150, 'title' => '2 hours 30 minutes'],
        ['id' => 180, 'title' => '3 hours'],
    ];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        if (auth()->user()->isAdmin()) {
            $this->tutors = User::whereHas('role', function ($query) {
                $query->where('name', 'tutor');
            })->get();
        } else if (auth()->user()->isTutor()) {
            $this->tutors = [auth()->user()];
        }

        $this->parents = User::whereHas('role', function ($query) {
            $query->where('name', 'parent');
        })->get();
        
        $this->tutoringSession = new TutoringSession();
        $this->durations = collect($this->durations)->map(function ($duration) {
            return (object) $duration;
        })->toArray();
    }

    public function updatedTutoringSessionParentId($value)
    {
        $this->children = User::find($value)->children()->get();
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('tutoring-sessions.create')->extends('layouts.app');
    }

    /**
     * Store new tutoringsession.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate();

        // create-review
        TutoringSession::create([]);

        msg_success('TutoringSession has been successfully created.');

        return redirect()->route('tutoring-sessions.index');
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'tutoringSession.tutor_id' => ['required', 'exists:users,id'],
            'tutoringSession.parent_id' => ['required', 'exists:users,id'],
            'tutoringSession.student_id' => ['required', 'exists:users,id'],
            'tutoringSession.duration' => ['required', 'in:30,60,90,120,150,180'],
            'tutoringSession.comment' => 'nullable|string|max:255',
            'tutoringSession.date' => 'required|date',
            'tutoringSession.book' => 'string|max:255',
        ];
    }
}
