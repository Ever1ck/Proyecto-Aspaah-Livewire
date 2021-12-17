<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Livewire\Component;

class Show extends Component
{
    public $persona;

    public function mount($id)
    {
        $this->persona = Persona::where('id_persona', $id)->first();
    }

    public function render()
    {
        return view('livewire.personas.show');
    }
}
