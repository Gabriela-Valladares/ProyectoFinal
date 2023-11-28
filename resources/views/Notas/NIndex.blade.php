@extends('Plantilla')

@section('titulo', 'Notas')

@section('contenido')

<style>
    .relevante {
        background-color: red; 
    }

    .emergencia {
        background-color: yellow;
    }

    .sinimportancia {
        background-color: green; 
    }

    .nomal {
        background-color: white;
    }

    .etiqueta-esquina {
        position: absolute;
        top: 0;
        right: 0;
        margin: 10px;
    }

</style>

@if (session('mensaje'))
    <div class="alert alert-success bg-success text-white d-flex align-items-center position-relative" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="btn-close position-absolute top-1 end-0 text-white" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif


<br>
<div class="container" style= "max-width: 1000px; font-weight:bold;  background-color:#ffe4e1">
    <table class="table table-striped" style="font-weight:bold;  background-color:#f8edeb">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Contenido</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($Notas as $nota)
            <tr>
                <td>{{ $nota->Id }}</td>
                <td>{{ $nota->Titulo }}</td>
                <td>{{ $nota->Categoria }}</td>
                <td>{{ $nota->Contenido }}</td>
                <td>{{ $nota->Fecha }}</td>
                <td>
                    <a href="{{ route('nota.show', ['id' => $nota->id]) }}" class="btn btn-success">Ver</a>
                    <a href="{{ route('nota.editar', ['id' => $nota->id]) }}" class="btn btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modal-{{ $nota->id }}">
                        Eliminar
                    </button>

                    <form method="post" action="{{ route('nota.borrar', [$nota->id]) }}">
                        @method('DELETE')
                        @csrf

                        <div class="modal" id="modal-{{ $nota->id }}" tabindex="-1">
                            <div class="modal-dialog" style="font-weight:bold;  background-color:#b0f2c2">
                                <div class="modal-content" style="font-weight:bold;  background-color:#b0f2c2">
                                    <div class="modal-header" style="font-weight:bold;  background-color:#b0f2c2">
                                        <h5 class="modal-title" style="font-weight:bold;  background-color:#b0f2c2">Eliminar esta nota</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea eliminar esta nota?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No hay notas disponibles.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="container mt-3" style="font-weight:bold;">
    {{ $Notas->render('pagination::bootstrap-4') }}
</div>
@endsection
