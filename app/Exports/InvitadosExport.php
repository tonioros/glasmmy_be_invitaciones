<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvitadosExport implements FromCollection, WithHeadings
{
    private $filters = [];
    private $sort = [];

    private $columns = [
        'invitados.nombre',
        'cantidad_invitados',
        'mesa_asignada',
        'fecha_limite_confirmo',
        'confirmado',
        'acompanantes',
        'fecha_confirmacion',
        'total_personas_conf'];

    public function __construct($filters = [], $sort = [])
    {
        $this->filters = $filters;
        $this->sort = $sort;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = Auth::user();
        $invitadoBuild = DB::table('invitados')
            ->leftJoin("confirmaciones", "confirmaciones.invitado_id", "=", "invitados.id")
            ->rightJoin("invitaciones", "invitados.invitacion_id", "=", "invitaciones.id")
            ->where('invitaciones.user_id', $user->id)
            ->select($this->columns);

        if ($this->filters && count($this->filters) > 0) {
            foreach ($this->filters as $filterName => $filterValue) {
                $invitadoBuild->where('invitados.'.$filterName, $filterValue);
            }
        }

        if ($this->sort && count($this->sort) > 0) {
            foreach ($this->sort as $sorter) {
                $invitadoBuild->orderBy($sorter['column'], $sorter['sort']);
            }
        }
        return $invitadoBuild->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Cantidad invitados',
            'Mesa asignada',
            'Fecha limite confirmo',
            'Confirmacion',
            'Acompañantes',
            'Fecha confirmacion',
            'Total personas conf'];

    }
}
