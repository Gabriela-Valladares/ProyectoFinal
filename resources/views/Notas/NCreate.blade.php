@extends('Plantilla')

@section('titulo', 'Crear Nota')

@section('contenido')

    <br><br>
    <form method="POST" action="{{ route('nota.store') }}" class="needs-validation">
        @csrf 
        
        <div class="container" style="max-width: 1000px; background-color:#77dd77">
            <div class="card" style="max-width: 1000px; background-color:#77dd77">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">CREAR NOTA</h4>
                    <div>
                        <h5 style="font-weight:bolder; font-family:serif;font-size:18pt;color:Black;background-color:#fdfd96">Categoria:</h5>
                        <select id="categoria" name="categoria" required>
                            @forelse($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @empty
                                <option>No hay categorías</option>
                            @endforelse
                        </select>
                </div>

                <div>
                        <h6 style="font-weight:bolder; font-family:serif;font-size:18pt; color:Black;background-color:#fdfd96">Etiqueta:</h6>
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

                        <div class="card-title" style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">TITULO:
                            <input type="text"  style="font-weight:Ariel; font-family:Cursive"class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                id="titulo" placeholder="Ingrese El Titulo" value="{{ old('titulo') }}" required>

                            @error('titulo')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div class="card-title" style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">CONTENIDO:
                            <textarea class="form-control @error('titulo') is-invalid @enderror"  style="font-weight:Ariel; font-family:Cursive" placeholder="Ingrese el Contenido" id="contenido"
                                name="contenido" rows="4" value="{{ old('contenido') }}" required></textarea>

                            @error('contenido')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div class="card-title" style="font-weight:bolder; font-family:serif;color:Black;background-color:#fdfd96">FECHA:
                            <input type="text" class="form-control @error('fecha') is-invalid @enderror"  style="font-weight:Ariel; font-family:Cursive" name="fecha"
                                id="fecha" placeholder="Ingrese la Fecha" value="{{ old('fecha') }}" required>

                            @error('fecha')
                                <div class ="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div><br>

                        <div>
                            <input type="submit" class="btn btn-info" value="Crear">
                            <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection