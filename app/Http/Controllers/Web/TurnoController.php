<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Atencion;
use App\Models\Servicio;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atencions = Atencion::where('estado', true)
            ->with(['user', 'servicio', 'turno'])
            ->get();

        $atencionTurnos = collect();
        $id = 1;

        foreach ($atencions as $atencion) {
            $existing = $atencionTurnos->first(function ($item) use ($atencion) {
                return $item->user->id == $atencion->user_id && $item->servicio->id == $atencion->servicio_id;
            });

            if (!$existing) {
                $newItem = new stdClass;
                $newItem->id = $id++;
                $newItem->user = $atencion->user;
                $newItem->servicio = $atencion->servicio;
                $newItem->turnos = collect([$atencion->turno]);

                $atencionTurnos->push($newItem);
            } else {
                $existing->turnos->push($atencion->turno);
            }
        }

        //return $atencionTurnos->first()->turnos;


        //    return $atencionTurnos->first()['user'];


        ///return $atencionTurnos;
        return view('pages.administrador.turno.index', compact('atencionTurnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dias = Turno::all()->groupBy('dia');
        $personals = User::getPersonal();
        $tipos = ['M', 'E'];
        $servicios = Servicio::all()->groupBy('atencion');
        return $dias;
        //return view('pages.administrador.turno.create', compact('dias', 'personals', 'tipos', 'servicios')); falta implementar
        
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
