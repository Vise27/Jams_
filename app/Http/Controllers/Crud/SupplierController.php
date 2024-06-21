<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers=Supplier::orderBy('id','ASC')->get();
        return view('crud.suppliers.index',[
            'suppliers'=>$suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'email'  => 'required|string',
            'description' => 'nullable|string'         
        ]);

        Supplier::create($data);

        return to_route('supplier.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
        return view('crud.suppliers.show',[
            'supplier'=>$supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
        return view('crud.suppliers.edit',[
            'supplier'=>$supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'email'  => 'required|string',
            'description' =>'string'          
        ]);

        $supplier->update($data);

        return redirect()->route('supplier.show', $supplier->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('supplier.index')->with("success", "Animal deleted successfully");
    }
}
