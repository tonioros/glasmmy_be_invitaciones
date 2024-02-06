<?php

namespace App\Http\Controllers;

use App\Models\Invitacion;
use App\Models\User;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $user_access_token)
    {
        if (!$user_access_token) {
            return response(['message' => 'Access Token not valid'], 403);
        }
        $user_id = User::where('access_token', $user_access_token)->first();
        if (!$user_id) {
            return response(['message' => 'Access Token not found'], 403);
        }
        $invitaciones = Invitacion::where('user_id', $user_id->id)->get();

        return $invitaciones;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
