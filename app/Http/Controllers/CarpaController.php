<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carpa;
use Barryvdh\DomPDF\Facade\Pdf;

class CarpaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carpas=Carpa::all();
        return view('pages.carpas.index',compact('carpas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('pages.carpas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Carpa::create([
            'codigo'        =>  $request->codigo,
            'descripcion'   =>  $request->descripcion,
            'lugar'         =>  $request->lugar,
            'dimension'     =>  $request->dimension,
            'tipo_techo'    =>  $request->tipo_techo,
        ]);

        return redirect()->route('carpas.index');
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

    public function entregaPdf(){
        $comunarios=\App\Models\Comunario::all();
        $pdf = PDF::loadview('reports.carpas',compact('comunarios'));
        
        return $pdf->stream();
    }
        
}
