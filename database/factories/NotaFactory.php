<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Nota;

class NotaFactory extends Factory
{
    
    public function definition(): array
    {
        $etiqueta = ['Normal', 'Emergencia','Sin impotantancia','Relevante'];

        return [

            'Titulo'=>fake()->name(),
            'Contenido'=>fake()->text(),
            'Categoria'=>fake()->firstName(),
            'etiqueta'=>$etiqueta[0],
            'Fecha'=>fake()->date(),

        ];
    }
}
