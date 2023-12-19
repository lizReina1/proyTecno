<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Ficha;
use App\Models\Orden;
use App\Models\Servicio;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrdenController extends Controller
{
    
    public function createOrden(Request $request){
        try {
            
            $paciente = User::find($request->paciente_id);
            $doctor = User::find($request->doctor_id);
            $service = Servicio::find($request->servicio_id);
            $turn = Turno::find($request->schedule_id);
            $fechaHoraActual = Carbon::now();
            // Acceder a la fecha y hora actual en formato de cadena
            $fechaHoraFormateada = $fechaHoraActual->toDateTimeString();
            $atention = Atencion::getAtentionDoctorTurnService($doctor->id, $turn->id, $service->id);
            // dd('sasa', $atention);
            $ficha = Ficha::getFichaAtentionDate($atention->id, $request->dateService);
            if($ficha){
                $ficha->restante_ficha = $ficha->restante_ficha - 1;
                $ficha->save();
            }else{
                $ficha = Ficha::createFicha($request->dateService, $turn, $atention->id, $service->costo);
                $ficha->restante_ficha = $ficha->restante_ficha - 1;
                $ficha->save();
            }
            
            $orden = Orden::create([
                'servicio' => $service->nombre,
                'medico' => $doctor->name . $doctor->lastname,
                'costo' => $request->totalCost,
                'direccion_consultorio' => 'Av. Transcontinental, plan 3000',
                'fecha_atencion' => $request->dateService,
                'fecha_emision' => $fechaHoraFormateada,
                'forma_pago' => 'QR',
                'pagado' => false,
                'fecha_pago' => $fechaHoraFormateada,
                'ficha_id' => $ficha->id,
                'paciente_id' => $paciente->id,
                'servicio_id' => $service->id,
                'costo_servicio' => $request->cost,
                'descuento' => $request->discount,
                'nit' => $request->nit,
                'razon_social' => $request->businessName,
                'email' => $request->email,
                'celular' => $request->cellphone,
            ]);
            return $orden;
        } catch (\Exception $e) {
            // Devuelve una respuesta de error al cliente
            throw response()->json('Ha ocurrido un error crear el pago.' . $e->getMessage(), 500);
        }
    }
}
