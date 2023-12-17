<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    public function index()
    {
        $medicos = collect([
            ['name' => 'Juan Pablo', 'id' => 1],
            ['name' => 'María mercedes', 'id' => 2],
            ['name' => 'Benito Camela', 'id' => 3],
        ]);
        $horarios = collect([
            ['schedule' => '08:00 am - 12:00 pm', 'id' => 1],
            ['schedule' => '14:00 pm - 18:00 pm', 'id' => 2],
            ['schedule' => '19:00 pm - 07:00 am', 'id' => 3],
        ]);

        $data = [
            'medicos' => $medicos,
            'horarios' => $horarios,
            'day' => 'Martes',
            'cost' => '100',
        ];
        return view('payments.payment')->with($data);
    }

    public function generatePayment(Request $request)
    {
        // return $request->all();
        try {
            $lcComerceID           = "d029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c";
            $lnMoneda              = 2;
            $lnTelefono            = $request->cellphone;
            $lcNombreUsuario       = $request->businessName;
            $lnCiNit               = $request->nit;
            $lcNroPago             = "grupo001-9751";// . $request->nroPago;
            $lnMontoClienteEmpresa = $request->totalCost;
            $lcCorreo              = $request->email;
            $lcUrlCallBack         = "http://localhost:8000/";
            $lcUrlReturn           = "http://localhost:8000/";
            $laPedidoDetalle       = [
                    "servicio_id"=> 1,
                    "paciente_id"=> 1,
                    "paciente_nombre" => $request->businessName,
                    "precio" => $request->cost,
                    "descuento" => $request->discount,
                    "total" => $request->totalCost
                ];
            $lcUrl  = "";

            $loClient = new Client();
            if ($request->type_service == 1) {// por qr
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/generarqrv2";
            } elseif ($request->type_service == 2) {// tigo money
                $lcUrl = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/realizarpagotigomoneyv2";
            }

            $laHeader = [
                'Accept' => 'application/json'
            ];

            $laBody   = [
                "tcCommerceID"          => $lcComerceID,
                "tnMoneda"              => $lnMoneda,
                "tnTelefono"            => $lnTelefono,
                'tcNombreUsuario'       => $lcNombreUsuario,
                'tnCiNit'               => $lnCiNit,
                'tcNroPago'             => $lcNroPago,
                "tnMontoClienteEmpresa" => $lnMontoClienteEmpresa,
                "tcCorreo"              => $lcCorreo,
                'tcUrlCallBack'         => $lcUrlCallBack,
                "tcUrlReturn"           => $lcUrlReturn,
                'taPedidoDetalle'       => $laPedidoDetalle
            ];

            $loResponse = $loClient->post($lcUrl, [
                'headers' => $laHeader,
                'json' => $laBody
            ]);

            $laResult = json_decode($loResponse->getBody()->getContents());
            if ($request->type_service == 1) {
                
                $laValues = explode(";", $laResult->values)[1];

                $laQrImage = "data:image/png;base64," . json_decode($laValues)->qrImage;

                $response = [
                    'success' => true,
                    'img' => $laQrImage,
                ];
                return response()->json($response, 200);
                // $this->sendCorreo($laQrImage, $request->tcCorreo);
                // return view('mails.send-correo-pago', ['img' => json_decode($laValues)->qrImage]);
                // echo '<img src="' . $laQrImage . '" alt="Imagen base64">';
            } elseif ($request->type_service == 2) {

                $csrfToken = csrf_token();

                echo '<h5 class="text-center mb-4">' . $laResult->message . '</h5>';
                echo '<p class="blue-text">Transacción Generada: </p><p id="tnTransaccion" class="blue-text">'. $laResult->values . '</p><br>';
                echo '<iframe name="QrImage" style="width: 100%; height: 300px;"></iframe>';
                echo '<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>';

                echo '<script>
                        $(document).ready(function() {
                            function hacerSolicitudAjax(numero) {
                                Agrega el token CSRF al objeto de datos
                                var data = { _token: "' . $csrfToken . '", tnTransaccion: numero };
                                
                                $.ajax({
                                    url: \'/consultar\',
                                    type: \'POST\',
                                    data: data,
                                    success: function(response) {
                                        var iframe = document.getElementsByName(\'QrImage\')[0];
                                        iframe.contentDocument.open();
                                        iframe.contentDocument.write(response.message);
                                        iframe.contentDocument.close();
                                    },
                                    error: function(error) {
                                        console.error(error);
                                    }
                                });
                            }

                            setInterval(function() {
                                hacerSolicitudAjax(' . $laResult->values . ');
                            }, 7000);
                        });
                    </script>';


            
            }
            return 'succes';
        } catch (\Throwable $th) {

            return $th->getMessage() . " - " . $th->getLine();
        }
    }
    public function sendCorreo($value, $correo){
        // $data = (object)[
        //     'asunto' => 'Envio de pago Qr',
        //     'img' => $value
        // ];
        // Mail::to($correo)->send(new SendCorreo($data));
        // return 'correo enviado';
    }
}
