<?php

namespace App\Livewire;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Livewire\Component;

class ApplicationModal extends Component
{
    public $isOpen = false;
    public $name;
    public $phone;
    public $email;
    public $description;

    protected $listeners = ['openApplicationModal' => 'open'];

    public function open()
    {
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['name', 'phone', 'email', 'description']);
        $this->resetErrorBag();
    }

    public function submit()
    {
        $validated = $this->validate((new ApplicationRequest())->rules());

        Application::create($validated);

        $this->dispatch('alert', type: 'success', message: 'Заявка отправлена!');
        $this->close();
    }

    public function render()
    {
        return view('livewire.application-modal');
    }
}
