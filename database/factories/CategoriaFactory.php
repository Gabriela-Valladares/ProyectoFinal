<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Categoria;

class CategoriaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre'=>fake()->name(),
        ];
    }
}