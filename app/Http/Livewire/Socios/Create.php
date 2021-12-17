<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Departamento;
use App\Models\sys\Distrito;
use App\Models\sys\Persona;
use App\Models\sys\Provincia;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\sys\Socio;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class Create extends Component
{
    use LivewireWithFileUploads;
    
    use LivewireAlert;

    protected $rules = [
        'personas_id' => 'required',
        'codigo' => 'required',
        'tipo' => 'required',
        'categoria' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        'comunidad' => 'required',
        'distrito_id' => 'required',
        'provincia_id' => 'required',
        'departamento_id' => 'required',
    ];

    public $personas_id, $codigo, $tipo, $categoria, $imagen, $es_socio, $comunidad, $distrito_id, $provincia_id, $departamento_id, $id_socios;

    public function render()
    {
        $personas = Persona::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();
        return view('livewire.socios.create', compact('personas', 'departamentos', 'provincias', 'distritos'));
    }

    public function create() {

        $this->validate();

        Socio::create([
            'personas_id' => $this->personas_id,
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'categoria' => $this->categoria,
            'imagen' => $this->imagen->storeAs('imagen', date('YmdHis'), 'public_upload'),
            'es_socio' => '1',
            'comunidad' => $this->comunidad,
            'distrito_id' => $this->distrito_id,
            'provincia_id' => $this->provincia_id,
            'departamento_id' => $this->departamento_id,
            'id_socios' => $this->id_socios
            
        ]) ;
        
        // Store in the "photos" directory with the filename "avatar.png".
        
        
        $this->flash('success','¡Se registró!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se registró correctamente a la persona',
        ], '/socios');
    }

    public function updated($props) {
        $this->validateOnly($props);
    }
}
