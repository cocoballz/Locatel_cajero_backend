<?php

namespace App\Http\Controllers;

use App\Models\CuentaModel;
use App\Models\TipoCuentaModel;
use App\Models\TipoTramiteModel;

class TransactionController extends Controller
{
    /**
     * create_acount : permite la creación de nuevas cuentas
     * variables: [nombre,valor_inicial,user]
     * token: validado por middleware Auht:sanctum
     * Dev: Sebastian Carvajal 29/10/2021
     */
    public function create_acount()
    {
        $datos = Request()->validate([
            'nombre' => 'required|string|min:8',
            'valor_inicial' => 'required|numeric|min:0',
            'user' => 'required|integer',
        ]);
        $cuenta = CuentaModel::create([
            //'cuenta'=>'',
            'id_user' => $datos['user'],
            'id_tipocuenta' => 1, //Este tipo de cuenta pertenece al ID de la tabla tipo_cuenta
            'cliente_nomrbe' => $datos['nombre'],
            'saldo' => $datos['valor_inicial'],
        ]);
        CuentaModel::where('id', $cuenta->id)->update(['cuenta' => ($cuenta->id + 1000)]);

        return response()->json([
            'status' => 1,
            'message' => 'registro creado con exito',
        ]);
    }

    /**
     * tramite : permite identificar la accion que desea realizar el usuario
     * variables: [cuenta,valor,tipo]
     * token: validado por middleware Auht:sanctum
     * Dev: Sebastian Carvajal 29/10/2021
     * Observacion: Se define el tipo de actividad deacuerdo con el id de la tabla "tipo_tramite"
     *
     */
    public function tramite()
    {
        $datos = Request()->validate([
            'cuenta' => 'required|string|min:2',
            'valor' => 'required|numeric|min:0',
            'tipo' => 'required|integer',
        ]);
        $cuenta = CuentaModel::where('cuenta', $datos['cuenta'])->get();
        $tipo_tramite = TipoTramiteModel::findOrFail($datos['tipo']);

        switch ($tipo_tramite->id) {
            case 1:  // CONSULTAR
                return $cuenta;
                break;
            case 2: // RETIRAR
                $status = $this->gestion_cueta($datos, $cuenta, 'restar');

                return $status;
                break;
            case 3: // CONSIGNAR
                $status = $this->gestion_cueta($datos, $cuenta, 'sumar');

                return $status;
                break;
            default:
                return Response()->json([
                    'status' => 0,
                    'message' => 'Tramite no valido',
                ], 404);
        }
    }
    /**
     * tramite : permite sumar o restar valor al saldo de la cuenta
     * variables: [$datos,$cuenta,$tipo]
     * seguridad: validado por middleware Auht:sanctum en funciones publicas. Esta funcion es privada
     * Dev: Sebastian Carvajal 29/10/2021
     */
    private function gestion_cueta($datos, $cuenta, $tipo)
    {
        $cuenta = $cuenta['0'];
        if ($tipo === 'restar') {
            $new_valor = $cuenta->saldo - $datos['valor'];
            if ($new_valor < 0) {
                return Response()->json(['status' => 0, 'message' => 'Saldo insuficiente'], 404);
            } else {
                CuentaModel::where('id', $cuenta->id)->update(['saldo' => $new_valor]);

                return Response()->json(['status' => 1, 'message' => 'Cuenta Actualizada']);
            }
        }
        if ($tipo === 'sumar') {
            $new_valor = $cuenta->saldo + $datos['valor'];
            CuentaModel::where('id', $cuenta->id)->update(['saldo' => $new_valor]);

            return Response()->json(['status' => 1, 'message' => 'Cuenta Actualizada']);
        }
    }


    /*  Funciones public para armar el Frontend [Aun debe estar auht para poder acceder]*/

    /**
     * get_tipo_cuenta : permite listar todos los tipos de cuenta
     * Dev: Sebastian Carvajal 29/10/2021
     */
    public function get_tipo_cuenta(){
        return response()->json(
            ['status' => 1,
                'datos' => TipoCuentaModel::select( 'id as item_value','tc_nombre')->where('tc_estado',1)->get()
            ]);
    }

    /**
     * get_tipo_cuenta : permite listar todos los tipos de tramite que puede hacer el usuario
     * Dev: Sebastian Carvajal 29/10/2021
     */
    public function get_tipo_tramite(){
        return response()->json(
        ['status' => 1,
        'datos' => TipoTramiteModel::select( 'id as item_value','tt_nombre','tt_operacion')->where('tt_estado',1)->get()
        ]);
    }


}
