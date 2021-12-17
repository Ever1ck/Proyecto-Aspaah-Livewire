<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Departamento;
use App\Models\sys\Distrito;
use App\Models\sys\Persona;
use App\Models\sys\Provincia;
use App\Models\sys\Socio;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    
    public $socio;

    public $personas_id, $codigo, $tipo, $categoria, $imagen, $es_socio, $comunidad, $distrito_id, $provincia_id, $departamento_id, $id_socios;

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

    protected $listeners = [
        'update'
    ];

    public function mount($id)
    {
        $socio = Socio::where('id_socios', $id)->first();

        $this->id_socios = $id;
        $this->personas_id = $socio->personas_id;
        $this->codigo = $socio->codigo;
        $this->tipo = $socio->tipo;
        $this->categoria = $socio->categoria;
        $this->imagen = $socio->imagen;
        $this->comunidad = $socio->comunidad;
        $this->distrito_id = $socio->distrito_id;
        $this->provincia_id = $socio->provincia_id;
        $this->departamento_id = $socio->departamento_id;
    }

    public function render()
    {
        $personas = Persona::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();
        return view('livewire.socios.edit', compact('personas', 'departamentos', 'provincias', 'distritos'));
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

        $socio = Socio::find($this->id_socios);

        $socio->update([
            'personas_id' => $this->personas_id,
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'categoria' => $this->categoria,
            'imagen' => $this->imagen->storeAs('imagen', date('YmdHis'), 'public_upload'),
            'comunidad' => $this->comunidad,
            'distrito_id' => $this->distrito_id,
            'provincia_id' => $this->provincia_id,
            'departamento_id'  => $this->departamento_id,
        ]);

        $socio = $this->all();
        if($imagen = $this->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenSocio = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenSocio);
            $socio['imagen'] = "$imagenSocio";             
        }

        $this->flash('success','¡Se actualizó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se actualizó correctamente la persona',
        ], '/socios');
    }
}
