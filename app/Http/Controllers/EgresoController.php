<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Egreso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EgresoController extends Controller
{



    public function create($id = null)
    {

        $categorias = Categoria::all();
        $users = User::all();

        $egresos = null;
        if ($id) {
            $egresos = Egreso::findOrFail($id);
        }
        return view('egresos.egresos', compact('categorias','egresos','users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|int',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'id_categoria' => 'nullable|integer',
        ]);

        $egreso = new Egreso();
        $egreso->monto = $request->monto;
        $egreso->fecha = $request->fecha;
        $egreso->descripcion = $request->descripcion;
        $egreso->id_categoria = $request->id_categoria;
        $egreso->id_user = Auth::id();

        $egreso->save();

        return redirect()->route('egresos.index')->with('success', 'Egreso añadido con éxito.');
    }

    public function edit($id)
    {
        $egresos = Egreso::findOrFail($id);
        $categorias =Categoria::all();
        return view('egresos.edit', compact('egresos','categorias'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'monto' => 'required|numeric',
        'fecha' => 'required|date',
        'descripcion' => 'required|string',
        'id_categoria' => 'required|exists:categorias,id',
    ]);

    $egreso = Egreso::findOrFail($id);

    $egreso->monto = $request->monto;
    $egreso->fecha = $request->fecha;
    $egreso->descripcion = $request->descripcion;
    $egreso->id_categoria = $request->id_categoria;

    $egreso->save();

    return redirect()->route('egresos.index')->with('success', 'Egreso actualizado con éxito.');
}

    public function destroy($id)
    {
        $egreso = Egreso::findOrFail($id);
        $egreso->delete();

        return redirect()->route('egresos.index')->with('success', 'Egreso eliminado con éxito.');
    }


    public function index()
    {
        $egresos = Egreso::all();
        return view('egresos.index', compact('egresos'));
    }
}
