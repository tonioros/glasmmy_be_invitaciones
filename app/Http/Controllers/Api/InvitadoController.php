<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $invitadosList = DB::table('invitados')
            ->leftJoin("confirmaciones", "confirmaciones.invitado_id", "=", "invitados.id")
            ->rightJoin("invitaciones", "invitados.invitacion_id", "=", "invitaciones.id")
            ->where('invitaciones.user_id', $user->id)
            ->get();

        return $invitadosList;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
