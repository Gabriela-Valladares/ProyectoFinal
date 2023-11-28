<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Alumno;


class AlumnosSeeder extends Seeder
{

    public function run(): void
    {
        Alumno::factory()->count(5)->create();
    }
}
