<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    // Mostrar todas las obras
    public function index()
    {
        $obras = Obra::all();
        return response()->json($obras);
    }

    // Mostrar una sola obra
    public function show($id)
    {
        $obra = Obra::find($id);
        return response()->json($obra);
    }

    // Crear una nueva obra
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $obra = new Obra();
        $obra->titulo = $request->titulo;
        $obra->descripcion = $request->descripcion;
        $obra->usuario_id = auth()->id(); 
        $obra->save();

        return response()->json($obra, 201);
    }

    // Actualizar una obra
    public function update(Request $request, $id)
    {
        $obra = Obra::find($id);

        if ($obra) {
            $obra->titulo = $request->titulo;
            $obra->descripcion = $request->descripcion;
            $obra->save();

            return response()->json($obra);
        }

        return response()->json(['message' => 'Obra no encontrada'], 404);
    }

    // Eliminar una obra
    public function destroy($id)
    {
        $obra = Obra::find($id);

        if ($obra) {
            $obra->delete();
            return response()->json(['message' => 'Obra eliminada']);
        }

        return response()->json(['message' => 'Obra no encontrada'], 404);
    }
}
