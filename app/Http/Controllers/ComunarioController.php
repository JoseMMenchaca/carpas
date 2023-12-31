<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunario;


class ComunarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunarios=Comunario::all();
        return view('pages.comunarios.index',compact('comunarios'));
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

    public function comunario()
    {
        return view('pages.index');
    }

    public function buscarComunario(Request $request)
    {
        $comunario=Comunario::where('ci',$request->ci)->first();
        $ci=base64_encode($comunario->ci);
        return redirect()->route('siembra.form',[$ci]);  

    }

   
}
