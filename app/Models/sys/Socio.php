<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = "mae_socios";

    protected $primaryKey = 'id_socios';

    public $incrementing = true;

    protected $guarded = ['id_socios'];
    // protected $fillable = ['personas_id', 'codigo', 'tipo', 'categoria', 'es_socio', 'comunidad', 'distrito_id', 'provincia_id', 'departamento_id', 'imagen'];


    public function departamento() {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function provincia() {
        return $this->belongsTo(Provincia::class, 'provincia_id', 'id');
    }
    public function distrito() {
        return $this->belongsTo(Distrito::class, 'distrito_id', 'id');
    }

    public function persona() {
        return $this->belongsTo('App\Models\sys\Persona', 'personas_id', 'id_persona');
    }
}
