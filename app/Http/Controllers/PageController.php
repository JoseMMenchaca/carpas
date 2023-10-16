<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function siembra($ci){
        $comunario=\App\Models\Comunario::where('ci',base64_decode($ci))->first();
        $hortalizas=\App\Models\Hortaliza::all();
        return view('pages.usoCarpas.siembra',compact('comunario','hortalizas'));
    }

    public function siembraCreate(Request $request, $ci)
    {
        $comunario=\App\Models\Comunario::where('ci',base64_decode($ci))->first();
        \App\Models\Siembra::create([
            'entrega_id'    =>      $comunario->entregas[0]->id ,
            'fecha_siembra' =>      $request->fecha,
            'dimension'     =>      $request->resultado,
            'variedad_id'   =>      $request->variedad,
            'precio_semilla'=>      $request->precio,
            'estado'        =>      'P', 
        ]);
        
        return redirect()->route('siembra.form',[$ci]);
    }

    public function cosecha($ci){
        $comunario=\App\Models\Comunario::where('ci',base64_decode($ci))->first();
        
        $siembra=\App\Models\Siembra::where('entrega_id',$comunario->entregas[0]->id)->where('estado','P')->get();
       
        return view('pages.usoCarpas.cosecha',compact('comunario','siembra'));
    }

    public function cosechaCreate(Request $request, $ci)
    {
        $comunario=\App\Models\Comunario::where('ci',base64_decode($ci))->first();
        \App\Models\Siembra::where('id',$request->id)->update([
            'estado'        =>      'C', 
        ]);
        
        \App\Models\Cosecha::create([
            'siembra_id'    =>  $request->id,
            'peso_cosecha'  =>  $request->peso,
            'unidad_medida' =>  $request->unidad,
            'fecha_cosecha' =>  $request->fecha,
        ]);
        return redirect()->route('cosecha.index',[$ci]);
    }

    public function uso($ci){
        $comunario=\App\Models\Comunario::where('ci',base64_decode($ci))->first();
        
        $siembra=\App\Models\Siembra::where('entrega_id',$comunario->entregas[0]->id)->where('estado','C')->get();
        return view('pages.usoCarpas.usos',compact('comunario','siembra'));
    }

    public function usoCreate(Request $request, $ci)
    {
        $comunario=\App\Models\Comunario::where('ci',base64_decode($ci))->first();
        \App\Models\Cosecha::where('id',$request->id)->update([
            'estado'        =>      'V', 
        ]);
        
        \App\Models\Uso::create([
            'cosecha_id'    =>  $request->id,
            'peso_venta'  =>  $request->peso,
            'peso_consumo' =>  $request->consumo,
            'precio_venta'  =>  $request->vendido_precio,
            'precio_consumo'  =>  $request->consumo_precio,
            'precio_total' =>  $request->precio,
            'fecha' =>  $request->fecha,
        ]);
        return redirect()->route('usos.index',[$ci]);
    }
}
