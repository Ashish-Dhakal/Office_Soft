<?php

namespace App\Livewire;

use Livewire\Component;

class ProjectStatusUpdateModal extends Component
{
    public $projectId;
    public $currentStatus;
    public bool $displayForm = false;

    public function mount($projectId, $currentStatus)
    {
        dd('sd');
        $this->projectId = $projectId;
        $this->currentStatus = $currentStatus;
    }
     public function showedit():void{
        $this->displayForm = ! $this->displayForm;
     }

    public function render()
    {
        return view('livewire.project-status-update-modal');
    }
}
