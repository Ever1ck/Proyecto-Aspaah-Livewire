<?php

namespace App\Http\Livewire\Personas;

use App\Models\sys\Persona;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $listeners = [
        'destroy'
    ];

    protected $paginationTheme = 'bootstrap';

    public $palabraBuscar, $tipoBuscar = 0, $personas;

    public $nombre, $ape_paterno, $ape_materno, $dni, $telefono, $sexo, $fe_nacimiento, $id_persona;

    public function render()
    {
        if ($this->tipoBuscar == '0') {
            $this->personas = Persona::where('nombre', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('nombre', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '1') {
            $this->personas = Persona::where('nombre', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('ape_paterno', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('ape_materno', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('nombre', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '2') {
            $this->personas = Persona::where('dni', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('dni', 'desc')->paginate(10); 
        } else {
            $this->personas = Persona::where('persona', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('id_persona', 'desc')->paginate(10); 
        }

        $links = $this->personas;
        $this->personas = collect($this->personas->items());

        return view('livewire.personas.index', ['personas' => compact($this->personas), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->id_persona = $id;
        $this->alert('question', '¿Desea eliminar?', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonColor' => '#d33',
            'text' => 'Los datos se eliminarán por completo',
            'confirmButtonColor' => '#3085d6'
        ]);
    }

    public function destroy() {
        if ($this->id_persona) {
            $persona = Persona::where('id_persona', $this->id_persona);
            $persona->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente la persona',
        ], '/personas');
    }
/* 
    public function saveRequisito() {
        $this->reqTBL = DB::select("call SP_INS_REQUISITOS('$this->palabraReq', @status)");
    } */
}
