<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class usuarioController extends Controller
{

    public function index(){
        try {
            $usuarios = UsuarioModel::all();
            if ($usuarios->isEmpty()) {
                return response()->json(['status' => true, 'mensaje' => 'No hay usuarios'], 200);
            }
            return response()->json(["status" => true, "data" => $usuarios], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'mensaje' => 'Error al realizar la consulta'], 500);
        }
    }

    public function store(Request $request){
        try {
            $datosValidados = $request->validate([
                'nombre_usuario'        => 'required|string',
                'apellido_usuario'      => 'required|string',
                'identificacion_usuario' => 'required|integer',
                'telefono_usuario'      => 'required|integer',
                'email_usuario'         =>  'required|email',
            ]);

            $registroUsuario = UsuarioModel::create($request->all());

            return response()->json(['status' => true, "mensaje" => "Usuario registrado correctamente", "usuario" => $registroUsuario], 200);

        } catch (\Exception $e) {
            return response()->json(["status" => "false", "mensaje" => "Error al registrar el usuario", "eeror" => $e->getMessage()], 500);
        }
    }

    public function show(string $id_usuario){

        try {
            $usuarioPorId = UsuarioModel::find($id_usuario);

            if (is_null($usuarioPorId)) {
                return response()->json(["status" => "true", "mensaje" => "No existe el usuario"], 404);
            }else{
                return response()->json(["status" => "true", "data" => $usuarioPorId], 200);
            }

        } catch (\Exception $e) {
            return response()->json(["status" => "false", "mensaje" => "Error al realizar la consulta", "Error" => $e->getMessage()], 500);
        }


    }

    public function update(Request $request, string $id)
    {
        try {

            $updateCategoria = UsuarioModel::find($id);

            if (is_null($updateCategoria)) {
                return response()->json(["status" => true, "mensaje" => "No existe el usuario"], 404);
            }

            $updateCategoria->update($request->all());
            return response()->json(["status" => "true", "data" => $updateCategoria], 200);

        } catch (\Exception $e) {
            return response()->json(["status" => "false", "mensaje" => "Error al actualizar el usuario"], 500);
        }
    }

    public function destroy(string $id){
        try {
            $deleteUsuario = UsuarioModel::find($id);

            if (is_null($deleteUsuario)) {
                return response()->json(["status" => true, "mensaje" => "No existe el usuario"], 404);
            }

            $deleteUsuario->update(["estado_usuario" => 0]);
            return response()->json(["status" => "true", "mensaje" => "El usuario fue eliminado correctamente"], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => "false", "mensaje" => "Error al eliminar el usuario"], 500);
        }
    }
}
