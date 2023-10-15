<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HortalizaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    public function buscarVariedad(Request $request){
        
        if($request->ajax()) {
           
            
            $id=$request->id;
            
            if($id != 'null'){   
                $valid_data = [];
                
                    $data = $variedades=\App\Models\Variedad::where('hortaliza_id',$id)->get();
                    foreach ($data as $row) {
                        $valid_data[] = ['id' => $row->id, 'variedad' =>$row->variedad];
                     }               
            }
        }    
        return response()->json($valid_data);        
    }
}
