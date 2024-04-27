<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener las fechas de ayer y mañana
        $ayer = Carbon::yesterday();
        $manana = Carbon::tomorrow();

        // Insertar eventos en la tabla "eventos"
        DB::table('eventos')->insert([
            [
                'titulo' => 'Evento 1',
                'descripcion' => 'Descripción del evento 1',
                'subtitulo' => 'Subtítulo del evento 1',
                'fecha_inicio' => $ayer->copy()->addHours(10), // Ayer a las 10:00 AM
                'fecha_fin' => $ayer->copy()->addHours(12), // Ayer a las 12:00 PM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo' => 'Evento 2',
                'descripcion' => 'Descripción del evento 2',
                'subtitulo' => 'Subtítulo del evento 2',
                'fecha_inicio' => $ayer->copy()->addHours(14), // Ayer a las 2:00 PM
                'fecha_fin' => $ayer->copy()->addHours(16), // Ayer a las 4:00 PM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'titulo' => 'Evento 3',
                'descripcion' => 'Descripción del evento 3',
                'subtitulo' => 'Subtítulo del evento 3',
                'fecha_inicio' => $manana->copy()->addHours(9), // Mañana a las 9:00 AM
                'fecha_fin' => $manana->copy()->addHours(11), // Mañana a las 11:00 AM
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Agrega más eventos según sea necesario
        ]);
    }
}
