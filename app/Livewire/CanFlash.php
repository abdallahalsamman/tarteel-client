<?php

namespace App\Livewire;

trait CanFlash
{
    /**
     * Dispatch browser danger flash event.
     *
     * @param  string  $message
     * @return void
     */
    protected function dispatchFlashDangerEvent($message)
    {
        return $this->dispatch('flash', [
            'level' => 'alert-danger',
            'message' => $message,
        ]);
    }

    /**
     * Dispatch browser success flash event.
     *
     * @param  string  $message
     * @return void
     */
    protected function dispatchFlashSuccessEvent($message)
    {
        return $this->dispatch('flash', [
            'level' => 'alert-success',
            'message' => $message,
        ]);
    }
}
