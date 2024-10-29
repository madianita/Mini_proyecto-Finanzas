<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngresoController extends Controller
{



    public function create($id = null)
    {

        $categorias = Categoria::all();
        $users = User::all();

        $ingreso = null;
        if ($id) {
            $ingreso = Ingreso::findOrFail($id);
        }
        return view('ingresos.ingresos', compact('categorias','ingreso','users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|int',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'id_categoria' => 'nullable|integer',
        ]);

        $ingreso = new Ingreso();
        $ingreso->monto = $request->monto;
        $ingreso->fecha = $request->fecha;
        $ingreso->descripcion = $request->descripcion;
        $ingreso->id_categoria = $request->id_categoria;
        $ingreso->id_user = Auth::id();

        $ingreso->save();

        return redirect()->route('ingresos.index')->with('success', 'Ingreso añadido con éxito.');
    }

    public function edit($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $categorias =Categoria::all();
        return view('ingresos.edit', compact('ingreso','categorias'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'monto' => 'required|numeric',
        'fecha' => 'required|date',
        'descripcion' => 'required|string',
        'id_categoria' => 'required|exists:categorias,id',
    ]);

    $ingreso = Ingreso::findOrFail($id);

    $ingreso->monto = $request->monto;
    $ingreso->fecha = $request->fecha;
    $ingreso->descripcion = $request->descripcion;
    $ingreso->id_categoria = $request->id_categoria;

    $ingreso->save();

    return redirect()->route('ingresos.index')->with('success', 'Ingreso actualizado con éxito.');
}

    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->delete();

        return redirect()->route('ingresos.index')->with('success', 'Ingreso eliminado con éxito.');
    }


    public function index()
    {
        $ingresos = Ingreso::all();
        return view('ingresos.index', compact('ingresos'));
    }
}
