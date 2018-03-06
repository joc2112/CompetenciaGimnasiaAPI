<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models;
class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Si no existe ningun registro de algun torneo,
        // redirigir a la pagina para crear nuevo torneo
        if(Models\Torneo::count() == 0){
            return redirect()->route('crud.torneo.create');    
        }
        $torneos = Models\Torneo::all();
        return view("admin.select_torneo_form",["torneos" => $torneos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Seleccionar un torneo para usar durante la session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {   
        $torneo = Models\Torneo::find($request->torneo);
        $request->session()->put('torneo_id', $torneo);
        $torneos = Models\Torneo::all();
        return view("admin.select_torneo_form",["torneos" => $torneos]);
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
