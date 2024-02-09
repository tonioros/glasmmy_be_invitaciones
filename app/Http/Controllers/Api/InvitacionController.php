<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Invitacion::where('user_id', Auth::user()->id)->get();
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
