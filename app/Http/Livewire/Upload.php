<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Upload extends Component
{
	public $listeners = [
        'addFile' => 'addFile'
    ];

    public $bodyBorder;
    public $errorContainer;

    public function render()
    {
        return view('livewire.upload');
    }
}
