<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Alumno;
use App\models\Nota;
use App\models\Etiqueta;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call(AlumnosSeeder::class);
        $this->call(NotasSeeder::class);
        $this->call(EtiquetaSeeder::class);

    }
}

