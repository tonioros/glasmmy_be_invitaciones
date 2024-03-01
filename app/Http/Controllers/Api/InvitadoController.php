<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitacion;
use App\Models\Invitado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvitadoController extends Controller
{
    public function index()
    {
        $invitacionList = Invitacion::select('id')
            ->where("user_id", Auth::user()->id)->get();
        return $invitacionList;
    }

    public function confirmadosEInvitados()
    {
        $user = Auth::user();
        $invitaciones = Invitacion::where("user_id", $user->id)->get();
        $invitadosList = DB::table('invitados')
            ->leftJoin("confirmaciones", "confirmaciones.invitado_id", "=", "invitados.id")
            ->rightJoin("invitaciones", "invitados.invitacion_id", "=", "invitaciones.id")
            ->where('invitaciones.user_id', $user->id)
            ->select(['invitados.nombre',
                'cantidad_invitados',
                'access_token',
                'invitacion_id',
                'mesa_asignada',
                'fecha_limite_confirmo',
                'invitados.id',
                'confirmado',
                'fecha_confirmacion',
                'total_personas_conf',])
            ->get();

        $invitadosPorInvitacion = collect();

        // Organiza invitados por invitacion
        foreach ($invitaciones as $invitacion) {
            $invitados = $invitadosList->where("invitacion_id", $invitacion->id)->all();
            $invitacionConInvitados = [
                'id' => $invitacion->id,
                'nombre' => $invitacion->nombre,
                'fecha_evento' => $invitacion->fecha_evento,
                'lugar_evento' => $invitacion->lugar_evento,
                'url_lugar_evento' => $invitacion->url_lugar_evento,
                'invitados' => $invitados
            ];
            $invitadosPorInvitacion->add($invitacionConInvitados);
        }
        return $invitadosPorInvitacion;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'nullable|string',
            'cantidad_invitados' => 'required|integer',
            "invitacion_id" => 'required|integer',
            "mesa_asignada" => 'required|integer',
            "fecha_limite_confirmo" => 'date',
        ]);

        if ($validated) {
            $nombre = $request->get('nombre');
            $invitadoNuevo = new Invitado([
                'nombre' => $nombre && strlen($nombre) > 0 ? $nombre : null,
                'cantidad_invitados' => $request->get('cantidad_invitados'),
                "invitacion_id" => $request->get('invitacion_id'),
                "mesa_asignada" => $request->get('mesa_asignada'),
                "fecha_limite_confirmo" => $request->get('fecha_limite_confirmo'),
                "access_token" =>  Str::random(35),
            ]);
            $invitadoNuevo->save();
            return $invitadoNuevo->id;
        } else {
            return response()->json(['message' => 'Hubo un problema al guardar los datos  '.$validated], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitacion $invitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitacion $invitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitacion $invitacion)
    {
        //
    }
}
