<?php

namespace App\Http\Livewire;

use App\Models\TutoringSession;
use Livewire\Component;

class EditTutoringSessionComponent extends Component
{
    

    /** @var \App\Models\TutoringSession */
    public TutoringSession $tutoringsession;

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('users.edit')->extends('layouts.app');
    }

    /**
     * Update existing tutoringsession.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->validate();

        // edit-review
        $this->tutoringsession->save();

        msg_success('TutoringSession has been successfully updated.');

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
            // edit-review
        ];
    }
}
