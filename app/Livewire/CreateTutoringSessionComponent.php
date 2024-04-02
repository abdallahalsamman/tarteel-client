<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\TutoringSession;

class CreateTutoringSessionComponent extends Component
{
    /** @var \App\Models\TutoringSession */
    public $tutors, $parents, $children;

    public $duration, $note, $session_date, $subject, $parent_id, $student_id, $tutor_id;

    public $durations = [
        ['id' => 30, 'title' => 'نصف ساعة'],
        ['id' => 60, 'title' => 'ساعة'],
        ['id' => 90, 'title' => 'ساعة ونصف'],
        ['id' => 120, 'title' => 'ساعتين'],
        ['id' => 150, 'title' => 'ساعتين ونصف'],
        ['id' => 180, 'title' => 'ثلاث ساعات'],
    ];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        if (auth()->user()->isAdmin())
        {
            $this->tutors = Role::whereName(Role::TUTOR)->first()->users;
        }
        
        if (auth()->user()->isTutor())
        {
            $this->tutor_id = auth()->id();
        }

        $this->parents = Role::whereName(Role::PARENT)->first()->users;
        
        $this->durations = collect($this->durations)->map(function ($duration) {
            return (object) $duration;
        })->toArray();
    }

    public function updatedParentId($value)
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

        TutoringSession::create([
            'tutor_id' => $this->tutor_id,
            'student_id' => $this->student_id,
            'duration' => $this->duration,
            'note' => $this->note,
            'session_date' => $this->session_date,
            'subject' => $this->subject
        ]);

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
            'tutor_id' => ['required', 'exists:users,id'],
            'parent_id' => ['required', 'exists:users,id'],
            'student_id' => ['required', 'exists:users,id'],
            'duration' => ['required', 'in:30,60,90,120,150,180'],
            'note' => 'nullable|string|max:255',
            'session_date' => 'required|date',
            'subject' => 'string|max:255',
        ];
    }
}
