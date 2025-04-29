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

    public $selectedLawyerName = '';

    public function openModalWithLawyer($params = [])
    {
        $this->form['lawyer_id'] = $params['lawyer_id'] ?? null;
        $this->selectedLawyerName = $params['lawyer_name'] ?? '';
        $this->isOpen = true;

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
        $validated = $this->validate(
            (new ApplicationRequest())->rules(),
            (new ApplicationRequest())->messages()
        );

        $validated['form']['phone'] = preg_replace('/\D/', '', $validated['form']['phone']);

        Application::create([
            'name' => $validated['form']['name'],
            'phone' => $validated['form']['phone'],
            'email' => $validated['form']['email'],
            'description' => $validated['form']['description'],
            'lawyer_id' => $validated['form']['lawyer_id'] ?? null,
            'status' => 'new'
        ]);

        $this->closeModal();
        session()->flash('success', 'Заявка успешно отправлена!');
    }

    public function render()
    {
        return view('livewire.application-modal');
    }
}
