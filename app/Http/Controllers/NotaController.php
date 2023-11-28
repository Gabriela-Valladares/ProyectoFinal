<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Categoria;
use App\Models\Etiqueta;
class NotaController extends Controller
{
    
    public function index()
    {
        $notas = Nota::paginate(10);
        return view('Notas.NIndex')->with ('Notas',$notas);
    }


    public function create()
    {
        $categorias = Categoria::all();
        $etiquetas = Etiqueta::all();


        return view('Notas.NCreate',compact ('categorias','etiquetas'));
    }

    public function store(Request $request)
    {
        $request->validate([ 
            'titulo'=>'required|regex:/[A-Z][a-z]+/i', 
            'contenido'=>'required|regex:/[A-Z][a-z]+/i',
            'categoria'=>'required',  
            'etiqueta'=>'required', 
            'fecha'=>'required|date',
        ]);

        $nota = new Nota(); 
        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
    
        $categoria = Categoria::find($request->input('categoria'));

        if (!$categoria) {
            return redirect()->route('nota.crear')->with('error', 'La categoría no existe');
        }

        $etiqueta = Etiqueta::find($request->input('etiqueta'));

        if (!$etiqueta) {
            return redirect()->route('nota.crear')->with('error', 'La etiqueta no existe');
        }

    $nota->etiqueta = $etiqueta->nombre;
        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se ha creado exitosamente"; 
        } else {
            $mensaje = "La Nota no se ha creado exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }


    public function show(string $id)
    {
        $nota = Nota::findOrfail($id);
        return view('Notas.NShow' , compact('nota')); 
    }


    public function edit(string $id)
    {
        $nota = Nota::findOrfail($id);
        $categorias = Categoria::all();
        $etiquetas = Etiqueta::all();

        return view('Notas.NEdit', compact('categorias','etiquetas'))->with('notas',$nota);
    }


    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrfail($id);
        
        $request->validate([
            'titulo'=>'required|regex:/[A-Z][a-z]+/i',
            'contenido'=>'required|regex:/[A-Z][a-z]+/i',
            'categoria'=>'required',
            'fecha'=>'required|date',
        ]);

        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
    

        $categoria = Categoria::find($request->input('categoria'));

        if (!$categoria) {
            return redirect()->route('nota.editar')->with('error', 'La categoría no existe');
        }
        $etiqueta = Etiqueta::find($request->input('etiqueta'));

        if (!$etiqueta) {
            return redirect()->route('nota.crear')->with('error', 'La etiqueta no existe');
        }

    $nota->etiqueta = $etiqueta->nombre;
        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se ha creado exitosamente"; 
        } else {
            $mensaje = "La Nota no se ha creado exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }

    public function destroy(string $id)
    {
        $borrados = Nota::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "La Nota se ha eliminado exitosamente"; 
        }
        
        else{
            $mensaje = "La Nota no se ha eliminado exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje',$mensaje); 
    }
}
