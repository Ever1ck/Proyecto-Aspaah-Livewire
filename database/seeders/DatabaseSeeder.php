<?php

namespace Database\Seeders;

use App\Models\sys\Comunidad;
use App\Models\sys\Ingreso;
use App\Models\sys\Inscripcion;
use App\Models\sys\Persona;
use App\Models\sys\Requisito;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {


        $ADMIN = Persona::all()->first()->id_persona;

        \App\Models\User::create([
            'name' => 'Everick',
            'email' => 'ever1ever14@gmail.com',
            'password' => bcrypt('tkm.forever'),
            'persona_id' => $ADMIN
        ]);

    }
}
