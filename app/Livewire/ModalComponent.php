<?php

namespace App\Livewire;

use Livewire\Component;

class ModalComponent extends Component
{
    public $modalOpen = false;

    public function openModal()
    {
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
    }

    public function render()
    {
        return view('livewire.modal-component');
    }
}
