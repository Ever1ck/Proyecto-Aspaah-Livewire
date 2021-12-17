<?php

namespace App\Http\Livewire;

use App\Models\sys\Persona;
use Livewire\Component;
use Livewire\WithPagination;

class Personas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $personas, $NO_SOCIO, $AP_PATERNO, $AP_MATERNO, $CO_DNI, $NU_CELULAR, $TI_SEXO, $FE_NACIMIENTO, $ID_PERSONA;
    public $updateMode = false;

    public function render()
    {
        $this->personas = Persona::paginate(5);
        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas', ['personas' => compact($this->personas), 'links' => $links]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->ape_paterno = '';
        $this->ape_materno = '';
        $this->dni = '';
        $this->telefono = '';
        $this->sexo = '';
        $this->fe_nacimiento = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required|max:10',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'sexo' => 'required',
            'fe_nacimiento' => 'required',
        ]);

        Persona::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $persona = Persona::where('id', $id)->first();

        $this->id = $id;
        $this->nombre = $persona->nombre;
        $this->ape_paterno = $persona->ape_paterno;
        $this->ape_materno = $persona->ape_materno;
        $this->dni = $persona->dni;
        $this->telefono = $persona->telefono;
        $this->sexo = $persona->sexo;
        $this->fe_nacimiento = $persona->fe_nacimiento;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->ID_PERSONA) {
            $persona = Persona::find($this->user_id);
            $persona->update([
                'nombre' => 'required',
                'ape_paterno' => 'required',
                'ape_materno' => 'required',
                'dni' => 'required',
                'telefono' => 'required',
                'sexo' => 'required',
                'fe_nacimiento' => 'required',
            ]);

            $this->updateMode = false;

            session()->flash('message', 'Users Updated Successfully.');

            $this->resetInputFields();
        }
    }
    public function delete($id)
    {
        if($id){
            Persona::where('id',$id)->delete();

            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
