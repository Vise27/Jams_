<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modelos=Modelo::orderBy('id','ASC')->get();
        return view('crud.modelos.index',[
            'modelos'=>$modelos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.modelos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string'          
        ]);

        Modelo::create($data);

        return to_route('modelo.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
        return view('crud.modelos.show',[
            'modelo'=>$modelo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        //
        return view('crud.modelos.edit',[
            'modelo'=>$modelo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'description' =>'string'          
        ]);

        $modelo->update($data);

        return redirect()->route('modelo.show', $modelo->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        //
        $modelo->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('modelo.index')->with("success", "Animal deleted successfully");
    }
}
