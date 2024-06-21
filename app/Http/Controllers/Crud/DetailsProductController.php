<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\DetailsProduct;
use Illuminate\Http\Request;

class DetailsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailsProducts = detailsProduct::with('product')->orderBy('product_id', 'ASC')->get();
        return view('crud.details_products.index', compact('detailsProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.details_products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'product_id' => 'required|integer',
            'size' =>'nullable|string',
            'color' => 'nullable|string',
            'material' => 'nullable|string',
            'weight' => ['nullable', 'regex:/^\d{0,10}(\.\d{1,2})?$/']          
        ]);

        DetailsProduct::create($data);

        return to_route('detailsProduct.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailsProduct $detailsProduct)
    {
        //
        return view('crud.details_products.show',[
            'detailsProduct'=>$detailsProduct
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailsProduct $detailsProduct)
    {
        //
        return view('crud.details_products.edit',[
            'detailsProduct'=>$detailsProduct
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailsProduct $detailsProduct)
    {
        //
        $data = $request->validate([
            'product_id' => 'required|integer',
            'size' =>'nullable|string',
            'color' => 'nullable|string',
            'material' => 'nullable|string',
            'weight' => ['nullable', 'regex:/^\d{0,10}(\.\d{1,2})?$/']          
        ]);

        $detailsProduct->update($data);

        return redirect()->route('detailsProduct.show', $detailsProduct->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailsProduct $detailsProduct)
    {
        //
        $detailsProduct->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('detailsProduct.index')->with("success", "Animal deleted successfully");
    }
}
