<?php

namespace App\Livewire;

use App\Http\Requests\ApplicationRequest;
use Livewire\Component;
use App\Models\Application;

class ApplicationModal extends Component
{

    protected $listeners = [
        'openApplicationModal' => 'openModal',
        'closeModal' => 'closeModal',
        'openApplicationModalLawyer' => 'openModalWithLawyer'
    ];
    public $isOpen = false;
    public $form = [];

    public function openModalWithLawyer($params = [])
    {
        $this->form['lawyer_id'] = $params['lawyer_id'] ?? null;
        $this->isOpen = true;

        if (isset($params['lawyer_name'])) {
            session()->flash('selected_lawyer', $params['lawyer_name']);
        }
    }

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

        if(!isset($validated['form']['lawyer_id'])) {
            $validated['form']['lawyer_id'] = $this->form['lawyer_id'] ?? null;
        }

        Application::create($validated['form']);

        $this->closeModal();
        session()->flash('success', 'Заявка успешно отправлена!');
    }

    public function render()
    {
        return view('livewire.application-modal');
    }
}
