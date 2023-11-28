<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Alumno;

class AlumnoFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstName(),
            'apellido'=>fake()->lastName(),
            'Correo'=>fake()->email(),
            'Nombre_usuario'=>fake()->email(),
            'Celular'=>fake()->numerify('########'),

            /* $table->string('nombre');
            $table->string('apellido');
            $table->string('Correo')->Unique();
            $table->string('Nombre_usuario')->Unique();
            $table->integer('Celular');*/
        ];
    }
}