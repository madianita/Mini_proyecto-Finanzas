<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function create($id = null)
{
    $categoria = null;
    if ($id) {
        $categoria = Categoria::findOrFail($id);
    }
    return view('categorias.categorias', compact('categoria'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('categorias.edit', compact('categoria'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $categoria = Categoria::findOrFail($id);
    $categoria->nombre = $request->nombre;
    $categoria->save();

    return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
}

public function destroy($id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->delete();

    return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
}

    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }
}
