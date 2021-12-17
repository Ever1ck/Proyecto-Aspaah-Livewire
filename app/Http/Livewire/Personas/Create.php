<?php

namespace App\Http\Livewire\Personas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\sys\Persona;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    protected $rules = [
        'nombre' => 'required',
        'ape_paterno' => 'required',
        'ape_materno' => 'required',
        'dni' => 'required|max:8',
        'telefono' => 'required|max:9',
        'fe_nacimiento' => 'required',
        'es_civil' => 'required|in:1, 2, 3, 4',
        'sexo' => 'required|in:1, 2',
        'email' => 'required',
        'direccion' => 'required',
        
    ];

    public $nombre, $ape_paterno, $ape_materno, $dni, $telefono, $fe_nacimiento, $es_civil, $sexo, $email, $direccion, $es_persona, $fa_parentesco, $parentesco, $id_persona;
    
    public function render()
    {
        return view('livewire.personas.create');
    }

    public function create() {

        $this->validate();

        Persona::create([
            'nombre' => $this->nombre,
            'ape_paterno' => $this->ape_paterno,
            'ape_materno' => $this->ape_materno,
            'dni' => $this->dni,
            'telefono' => $this->telefono,
            'fe_nacimiento' => $this->fe_nacimiento,
            'es_civil' => $this->es_civil,
            'sexo' => $this->sexo,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'es_persona' =>'1',
            'fa_parentesco' => $this->fa_parentesco,
            'parentesco' => $this->parentesco,
            'id_persona' => $this->id_persona
            
        ]) ;

        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente a la persona',
        ], '/personas');
    }

    

    public function updated($props) {
        $this->validateOnly($props);
    }
}
