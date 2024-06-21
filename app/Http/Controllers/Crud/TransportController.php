<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transports=Transport::orderBy('id','ASC')->get();
        return view('crud.transport.index',[
            'transports'=>$transports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.transport.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'description' => 'nullable|string'        
        ]);

        Transport::create($data);

        return to_route('transport.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport $transport)
    {
        //
        return view('crud.transport.show',[
            'transport'=>$transport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transport $transport)
    {
        //
        return view('crud.transport.edit',[
            'transport'=>$transport
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transport $transport)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'description' => 'nullable|string'        
        ]);

        $transport->update($data);

        return redirect()->route('transport.show', $transport->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport $transport)
    {
        //
        $transport->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('transport.index')->with("success", "Animal deleted successfully");
    }
}
