<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=Categorie::orderBy('id','ASC')->get();
        return view('crud.categories.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.categories.create');
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

        Categorie::create($data);

        return to_route('categorie.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
        return view('crud.categories.show',[
            'categorie'=>$categorie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
        return view('crud.categories.edit',[
            'categorie'=>$categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'description' =>'string'          
        ]);

        $categorie->update($data);

        return redirect()->route('categorie.show', $categorie->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        //
        $categorie->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('categorie.index')->with("success", "Animal deleted successfully");
    }
}
