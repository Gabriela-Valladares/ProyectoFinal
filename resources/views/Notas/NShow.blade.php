@extends('Plantilla')

@section('titulo', 'Detalle de Nota')

@section('contenido')

    <br>

    <div class="container" style="max-width: 1000px; background-color:#fdfd96">

        <div class="card mb-4">

            <div class="card-body" >

                <p class="card-title">
                <b style="font-weight:bold;  background-color:#b0f2c2">Titulo de La Nota:</b><br> {{ $nota->Titulo }} 
                </p>

                <p class="card-title">
                <b  style="font-weight:bold;  background-color:#b0f2c2">Categoria:</b><br> {{ $nota->Categoria }}
                </p>

                <p class="card-title">
                <b  style="font-weight:bold;  background-color:#b0f2c2">Contenido:</b><br> {{ $nota->Contenido }}
                </p>

                <p class="card-title">
                <b  style="font-weight:bold;  background-color:#b0f2c2">Fecha:</b><br> {{ $nota->Fecha }}
                </p>

                <div>
                    <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>

                </div>
            </div>

        </div>

    </div>

@endsection
