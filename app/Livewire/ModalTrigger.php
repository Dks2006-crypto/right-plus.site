<?php

namespace App\Livewire;

use Livewire\Component;

class ModalTrigger extends Component
{
    public function openModal()
    {
        $this->dispatch('openApplicationModal');
    }

    public function render()
    {
        return view('livewire.modal-trigger');
    }
}
