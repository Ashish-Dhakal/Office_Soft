<?php

namespace App\Livewire;

use Livewire\Component;

class CLockIn extends Component
{
    public bool $isOpen = false; // State to control whether the modal is open or closed

    // Method to toggle the modal visibility
    public function toggleModal()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.c-lock-in');
    }
}
