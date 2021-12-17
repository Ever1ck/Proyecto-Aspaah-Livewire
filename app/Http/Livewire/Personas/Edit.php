<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    
    public $persona;

    public $nombre, $ape_paterno, $ape_materno, $dni, $telefono, $fe_nacimiento, $es_civil, $sexo, $email, $direccion, $es_persona, $fa_parentesco, $parentesco, $id_persona;
    
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

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {
        $persona = Persona::where('id_persona', $id)->first();

        $this->id_persona = $id;
        $this->nombre = $persona->nombre;
        $this->ape_paterno = $persona->ape_paterno;
        $this->ape_materno = $persona->ape_materno;
        $this->dni = $persona->dni;
        $this->telefono = $persona->telefono;
        $this->fe_nacimiento = $persona->fe_nacimiento;
        $this->es_civil = $persona->es_civil;
        $this->sexo = $persona->sexo;
        $this->email = $persona->email;
        $this->direccion = $persona->direccion;
        $this->fa_parentesco = $persona->fa_parentesco;
        $this->parentesco = $persona->parentesco;
    }

    public function render()
    {
        return view('livewire.personas.edit');
    }

    public function edit() {
        $this->alert('warning', '¿Desea actualizar?', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'update',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Los datos nuevos, remplazarán los datos antiguos',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function updated($props) {
        $this->validateOnly($props);
    }

    public function update() {
        $this->validate();

        $persona = Persona::find($this->id_persona);

        $persona->update([
            'nombre' => $this->nombre,
            'ape_paterno' => $this->ape_paterno,
            'ape_materno' => $this->ape_materno,
            'dni' => $this->dni,
            'telefono' => $this->telefono,
            'sexo' => $this->sexo,
            'fe_nacimiento' => $this->fe_nacimiento,
            'es_civil' => $this->es_civil,
            'sexo' => $this->sexo,
            'email'  => $this->email,
            'direccion' => $this->direccion,
            'fa_parentesco' => $this->fa_parentesco,
            'parentesco' => $this->parentesco,
        ]);

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente la persona',
        ], '/personas');
    }
}
