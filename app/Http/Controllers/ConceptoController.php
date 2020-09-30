<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concepto;
use Illuminate\Support\Facades\Redirect;

class ConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function nuevo()
    {
        $conceptos = Concepto::all();
        return view('conceptos.nuevo')->with(compact('conceptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $Concepto = new Concepto();
		if($request->id){
                $Concepto = Concepto::find($request->id);
                $Concepto->detalle = $request->detalle;
                $Concepto->ctacontable = $request->ctacontable;
                $Concepto->tipoconcepto = $request->tipoconcepto;              
                $mensaje = "Los datos del Concepto han sido modificados correctamente.";
                  $Concepto->save();
                  return Redirect::to('/conceptos/nuevo/')->with(compact('mensaje'));
        }else
        {
            $Concepto->detalle = $request->detalle;
            $Concepto->ctacontable = $request->ctacontable;
            $Concepto->tipoconcepto = $request->tipoconcepto;
            $mensaje = "Los datos del Concepto han sido Agregados correctamente.";
            $Concepto->save();
            return Redirect::to('/conceptos/nuevo/')->with(compact('mensaje'));
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
