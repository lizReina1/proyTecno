<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function index(){
        // $doctor_id = 2; //17;
        $doctor = User::find(Auth::user()->id);
        $citas = Cita::getcitasForDoctorId($doctor->id);
        // $citas = Cita::getcitasForDoctorId($doctor_id);
        // dd($citas);
        return view('cita.index', compact('citas'));
    }
    
    public function create(){
        $pacientes = User::patients();
        return view('cita.create', compact('pacientes'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $doctor = User::find(Auth::user()->id);
            $fechaString = $request->date_cita;
            $fechaObjeto = new DateTime($fechaString);
            // Formatear la fecha y hora según tu especificación
            $fechaFormateada = $fechaObjeto->format('Y-m-d H:i:sO');
            // dd( $request->all(), $doctor, $fechaFormateada);
            $cita = Cita::create([
                'fecha_cita' => $fechaFormateada,
                'estado_cita' => false,
                'costo_cita' => $request->costo,
                'paciente_id' => $request->patient,
                'medico_id' => $doctor->id,
            ]);
            DB::commit();
            session()->flash('success');
            return redirect()->route('cita_index');
        } catch (\Throwable $th) {
            DB::rollback();            
            session()->flash('error');
            return redirect()->route('cita_index');
        }
    }
}
