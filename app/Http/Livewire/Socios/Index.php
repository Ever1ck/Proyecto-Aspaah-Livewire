<?php

namespace App\Http\Livewire\Socios;

use App\Models\sys\Socio;
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

    public $palabraBuscar, $tipoBuscar = 0, $socios;

    public $persona_id, $codigo, $tipo, $categoria, $imagen, $es_socio, $comunidad, $distrito_id, $provincia_id, $departamento_id, $id_socios;


    public function render()
    {
        //
        if ($this->tipoBuscar == '0') {
            $this->socios = Socio::where('personas_id', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('personas_id', 'desc')->paginate(10); 
        } else if ($this->tipoBuscar == '1') {
            $this->socios = Socio::where('personas_id', 'like', '%' . $this->palabraBuscar . '%')
            ->orWhere('departamento_id', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('personas_id', 'desc')->paginate(10); 
        } else if($this->tipoBuscar == '2') {
            $this->socios = Socio::where('provincia_id', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('provincia_id', 'desc')->paginate(10); 
        } else {
            $this->socios = Socio::where('personas_id', 'like', '%' . $this->palabraBuscar . '%')
            ->orderBy('id_socios', 'desc')->paginate(10); 
        }
        $links = $this->socios;
        $this->socios = collect($this->socios->items());

        return view('livewire.socios.index', ['socios' => compact($this->socios), 
        'links' => $links]);
    }

    public function delete($id)
    {
        $this->id_socios = $id;
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
        if ($this->id_socios) {
            $socio = Socio::where('id_socios', $this->id_socios);
            $socio->delete();
        }

        $this->alert('success','¡Se eliminó!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Se eliminó correctamente la persona',
        ], '/personas');
    }
}
