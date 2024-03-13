<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteTutoringSessionComponent extends Component
{
    use CanFlash;

    /** @var \App\Models\TutoringSession */
    public $tutoringsession;

    public function render()
    {
        return view('tutoring-sessions.delete');
    }

    /**
     * Delete tutoringsession.
     *
     * @return void
     */
    public function destroy()
    {
        // delete-review

        $this->tutoringsession->delete();

        $this->emit('entity-deleted');

        $this->dispatchFlashSuccessEvent('TutoringSession has been successfully deleted.');
    }
}
