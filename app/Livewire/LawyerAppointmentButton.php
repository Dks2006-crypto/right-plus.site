<?php

namespace App\Livewire;

use App\Models\lawyer;
use Livewire\Component;

class LawyerAppointmentButton extends Component
{
    public lawyer $lawyer;
    public string $buttonClass = '';

    public function mount(lawyer $lawyer, string $buttonClass = '')
    {
        $this->lawyer = $lawyer;
        $this->buttonClass = $buttonClass;
    }

    public function openApplicationModalLawyer()
{
    $this->dispatch('openApplicationModalLawyer', [
        'lawyer_id' => $this->lawyer->id,
        'lawyer_name' => $this->lawyer->name,
    ]);
}

    public function render()
    {
        return view('livewire.lawyer-appointment-button');
    }
}
