<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Application;

class ApplicationModal extends Component
{

    protected $listeners = ['openModal' => 'openModal'];
    public $isOpen = false;
    public $form = [
        'name' => '',
        'phone' => '',
        'email' => '',
        'description' => ''
    ];

    protected function rules()
    {
        return [
            'form.name' => 'required|min:3|max:50',
            'form.phone' => 'required|min:10|max:20',
            'form.email' => 'required|email',
            'form.description' => 'required|min:10|max:1000'
        ];
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
        $validated = $this->validate();

        Application::create($validated['form']);

        $this->closeModal();
        session()->flash('success', 'Заявка успешно отправлена!');
    }

    public function render()
    {
        return view('livewire.application-modal');
    }
}
