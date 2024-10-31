<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class categoriaController extends Controller
{

    public function index(){
        return response()->json(Categoria::all(), 200);
    }

    public function store(Request $request){
        $crear = Categoria::create($request->all());
        return response()->json($crear);
    }

    public function show(string $id)
    {
        $categoriaID = Categoria::find($id);
        if (is_null($categoriaID)) {
            return response()->json(['mensaje' => 'No existe el registro', 404]);
        }else{
            return response()->json($categoriaID, 200);
        }
    }

    public function update(Request $request, string $id){

        $updateCategoria = Categoria::find($id);

        if (is_null($updateCategoria)) {
            return response()->json(['mensaje' => 'no existe el registro']);
        }

        $updateCategoria->update($request->all());
        return response()->json($updateCategoria,200);
    }


    public function destroy(string $id){
        $eliminarRegistro = Categoria::find($id);

        if (is_null($eliminarRegistro)) {
            return response()->json(['mensaje' => 'no existe el registro'], 404);
        }

        $eliminarRegistro->delete();

        return response()->json($eliminarRegistro);
    }
}
