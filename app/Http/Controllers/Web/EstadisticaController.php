<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Estadistica\StoreEstadisticaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function create()
    {
        return view('pages.administrador.estadisticas.create');
    }
    public function store(StoreEstadisticaRequest $request)
    {
        return $request;
        $resultados = DB::table($request->table)
            ->selectRaw('DATE(created_at) as fecha, COUNT(*) as cantidad')
            ->whereBetween('created_at', [$request->fecha_ini, $request->fecha_fin])
            ->groupBy('fecha')
            ->orderBy('fecha', 'ASC')
            ->get();
        $timestamps = [];
        $values = [];
        foreach ($resultados as $resultado) {
            $timestamps[] = $resultado->fecha;
            $values[] = $resultado->cantidad;
        }
        $nombre = '';
        if ($request->table == 'consultation_sheets') {
            $nombre = 'Fichas';
        } else {
            if ($request->table == 'medical_consultations') {
                $nombre = 'Consultas';
            } else {
                if ($request->table == 'dates') {
                    $nombre = 'Citas';
                }
            }
        }
        
        return view('pages.administrador.estadisticas.show', compact('timestamps', 'values', 'nombre'));
    }
}
