<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands=Brand::orderBy('id','ASC')->get();
        return view('crud.brands.index',[
            'brands'=>$brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.brands.create');
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

        Brand::create($data);

        return to_route('brand.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
        return view('crud.brands.show',[
            'brand'=>$brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        
        return view('crud.brands.edit',[
            'brand'=>$brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'description' =>'string'          
        ]);

        $brand->update($data);

        return redirect()->route('brand.show', $brand->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
        $brand->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('brand.index')->with("success", "Animal deleted successfully");
    }
}
