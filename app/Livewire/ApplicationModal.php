<?php

namespace App\Livewire;

use App\Http\Requests\ApplicationRequest;
use Livewire\Component;
use App\Models\Application;

class ApplicationModal extends Component
{

    protected $listeners = [
        'openApplicationModal' => 'openModal',
        'closeModal' => 'closeModal'
    ];
    public $isOpen = false;
    public $form = [];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset('form');
        $this->resetErrorBag();
    }

    public function submit()
    {
        $request = new ApplicationRequest();

        $validated = $this->validate(
            $request->rules(),
            $request->messages()
        );

        $validated['form']['phone'] = preg_replace('/\D/', '', $validated['form']['phone']);

        Application::create($validated['form']);

        $this->closeModal();
        session()->flash('success', 'Заявка успешно отправлена!');
    }

    public function render()
    {
        return view('livewire.application-modal');
    }
}
