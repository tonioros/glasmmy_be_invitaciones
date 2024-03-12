<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Confirmacion;
use App\Models\Invitado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmacionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invitado_id' => 'required|integer',
            'confirmado' => 'boolean|required',
            'fecha_confirmacion' => 'string|required',
            'total_personas_conf' => 'required|integer',
            'invitado_nombre' => 'nullable|string',
        ]);
        if ($validated) {
            $invitadoActual = Invitado::where('id', $request->get('invitado_id'))->first();
            if ($invitadoActual->nombre == null && $invitadoActual->nombre == '') {
                $invitadoActual->nombre = $request->get('invitado_nombre');
                $invitadoActual->save();
            }
            $newConfirm = Confirmacion::updateOrCreate(
                ["invitado_id" => $request->get('invitado_id'),],
                [
                    "invitado_id" => $request->get('invitado_id'),
                    "confirmado" => $request->get('confirmado'),
                    "fecha_confirmacion" => $request->get('fecha_confirmacion'),
                    "total_personas_conf" => $request->get('total_personas_conf'),
                ]);
            return $newConfirm->id;
        } else {
            return response()->json(['message' => 'Hubo un problema al guardar los datos  ' . $validated], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($access_token)
    {
        $confirmacion = DB::table('confirmacion')
            ->leftJoin('invitado', 'invitado.id', 'confirmacion.invitado_id')
            ->where('invitado.access_token', $access_token)
            ->select([
                "invitado_id",
                'confirmado',
                'fecha_confirmacion',
                'total_personas_conf',
                'nombre',
                'cantidad_invitados',
                "mesa_asignada",
                "fecha_limite_confirmo",
            ])->get();
        return $confirmacion;
    }
}
