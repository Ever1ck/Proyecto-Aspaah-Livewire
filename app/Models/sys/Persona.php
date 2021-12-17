<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = "mae_personas";

    protected $primaryKey = 'id_persona';

    public $incrementing = true;

    protected $guarded = ['id_persona'];
    /* protected $fillable =  ['nombre', 'ape_paterno', 'ape_materno', 'dni', 'dni', 'fe_nacimiento', 'es_civil', 'sexo', 'telefono', 'email', 'direccion', 'es_persona', 'fa_parentesco', 'parentesco']; */

    public function socio() {
        return $this->hasOne('App\Models\sys\Socio', 'persona_id', 'id_persona');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'persona_id', 'id_persona');
    }

    public function usuario() {
        return $this->hasOne('App\Models\sys\Usuario', 'persona_id', 'id_persona');
    }
}
