<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarAutoRequest;
use App\Http\Requests\ActualizarEstacionamientoRequest;
use App\Models\Estacionamiento;
use App\Models\Cajones;
use Illuminate\Http\Request;

class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estacionamiento = Estacionamiento::all();
        $cajones = Cajones::all();
        return response()->json([
            'estacionamiento' => $estacionamiento,
            'cajones' => $cajones
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarAutoRequest $request)
    {
        $estacionamiento = new Estacionamiento();
        $cajones = Cajones::all();
        $flag = false;
        
        for($i = 0; $i < $cajones->count(); $i++) {
            if($cajones[$i]->estado == 'libre') {
                $cajones[$i]->estado = 'ocupado';
                $cajones[$i]->save();
                $estacionamiento->matricula = $request->matricula;
                $estacionamiento->numero = $cajones[$i]->cajon;
                $estacionamiento->entrada = $request->entrada;              
                if($request->salida != null){
                    $estacionamiento->salida = $request->salida;
                    $cajones[$i]->estado = 'libre';
                    $cajones[$i]->save();
                }else{
                    if($request->salida == null || $request->salida == '') {
                        $estacionamiento->salida = null;
                    }
                }
                $estacionamiento->save();     
                return response()->json([
                    'estacionamiento' => $estacionamiento,
                    'cajones' => $cajones
                ], 200);
                //aqui cambiar el valor de la variable a true
                $flag = true;
            }
        }
        if($flag == false) {
            return response()->json([
                'message' => 'No hay cajones disponibles'
            ], 404);
        }
        return response()->json(['message' => 'No hay cajones disponibles'], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estacionamiento $estacionamiento)
    {
        return response()->json([
            'estacionamiento' => $estacionamiento,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarEstacionamientoRequest $request, Estacionamiento $estacionamiento)
    {
        $cajones = Cajones::all();
        
        if($estacionamiento->matricula == $request->matricula) {
            if($estacionamiento->salida != null){
                return response()->json(['message' => 'El vehiculo ya salio'], 404);
            }else{
                if($request->salida == null || $request->salida == '') {
                    return response()->json(['message' => 'Hora de salida invalida'], 404);
                }else{
                    $estacionamiento->salida = $request->salida;
                    for($i = 0; $i < $cajones->count(); $i++) {
                        if($estacionamiento->numero == $cajones[$i]->cajon){
                            $cajones[$i]->estado = 'libre';
                            $cajones[$i]->save();
                        }
                    }
                    $estacionamiento->save();
                    return response()->json([ 'message' => 'Se actualizo correctamente'], 200);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
