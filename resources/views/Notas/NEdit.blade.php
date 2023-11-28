@extends('Plantilla')

@section('titulo', 'Editar Nota')

@section('contenido')

    <br><br>
    <form method="POST" action="{{ route('nota.update', [$notas->id]) }}" class0="needs-validation">
        @method('PUT') 
        @csrf 

        <div class="container" style="max-width: 1000px; background-color:#77dd77">
            <div class="card" style="max-width: 1000px; background-color:#77dd77">

            <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">EDITAR NOTA</h4>
                    <div>
                        <b style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">Categoria:</b>
                        <select id="categoria" name="categoria" required>
                            @forelse($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty
                                <option>No hay categorías</option>
                            @endforelse
                        </select>
                </div>

                <div>
                        <b>Etiqueta:</b>
                        <select id="etiqueta" name="etiqueta" required>
                            @forelse($etiquetas as $etiqueta)
                                <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                            @empty
                                <option>No hay etiquetas</option>
                            @endforelse
                        </select>
                </div>
                
                </div>

                <div class="card">
                    <div class="card-body">

                        <div class="card-title"style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">TITULO:
                            <input type="text"  style="font-weight:Ariel; font-family:Cursive"class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                id="titulo" placeholder="Ingrese el nuevo Titulo"
                                value="{{ old('titulo') ?? $notas->titulo }}" required>

                            @error('titulo')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>


                        <div class="card-title" style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">CONTENIDO:
                            <textarea class="form-control @error('titulo') is-invalid @enderror" style="font-weight:Ariel; font-family:Cursive"placeholder="Ingrese el nuevo Contenido"
                                id="contenido" name="contenido" rows="4" value="{{ old('contenido') ?? $notas->contenido }}" required></textarea>

                            @error('contenido')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>


                        <div class="card-title"style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">FECHA:
                            <input type="text" style="font-weight:Ariel; font-family:Cursive" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
                                id="fecha" placeholder="Ingrese la nueva Fecha"
                                value="{{ old('fecha') ?? $notas->fecha }}" required>

                            @error('fecha')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>


                        <div>
                            <input type="submit" class="btn btn-primary" value="Editar">
                            <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
