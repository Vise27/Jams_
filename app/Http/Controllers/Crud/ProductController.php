<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Product;
use Illuminate\Http\Request;
use App\Models\Crud\Brand;
use App\Models\Crud\Supplier;
use App\Models\Crud\Categorie;
use App\Models\Crud\Modelo;
use App\Models\User;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand', 'supplier', 'categorie', 'modelo')->orderBy('id', 'ASC')->get();
        return view('crud.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $categories = Categorie::all();
        $modelos = Modelo::all();
        return view('crud.products.create', compact('brands', 'suppliers', 'categories', 'modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'brand_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'categorie_id' => 'required|integer',
            'modelo_id' => 'required|integer',
            'price' => ['required', 'regex:/^\d{0,10}(\.\d{1,2})?$/'],
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|string'
        ]);

        // Image upload
        $imageName = NULL;
        if ($request->image != NULL) {
            $imageObject = $request->image;
            $imageExtension = $imageObject->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;
            $imageObject->move(public_path('crud/images'), $newImageName);
            $imageName = $newImageName;
        }

        $data['image'] = $imageName;
        Product::create($data);

        return to_route('product.create')->with("success", "Successfully, product was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('crud.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('crud.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'brand_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'categorie_id' => 'required|integer',
            'modelo_id' => 'required|integer',
            'price' => ['required', 'regex:/^\d{0,10}(\.\d{1,2})?$/'],
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|string'
        ]);

        // Image upload
        if ($request->image != NULL) {
            $imageObject = $request->image;
            $imageExtension = $imageObject->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;
            $imageObject->move(public_path('crud/images'), $newImageName);
            $data['image'] = $newImageName;
        }

        $product->update($data);
        return redirect()->route('product.show', $product->id)->with("success", "Successfully, product was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with("success", "Product deleted successfully");
    }


    

    
}

