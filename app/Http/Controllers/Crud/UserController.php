<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=User::orderBy('id','ASC')->get();
        return view('crud.users.index',[
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.users.create');
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
            'password' => 'required|string',
            'direccion' => 'required|string'      
        ]);

        User::create($data);

        return to_route('user.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view('crud.users.show',[
            'user'=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        return view('crud.users.edit',[
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'direccion' => 'required|string'      
        ]);

        $user->update($data);

        return redirect()->route('user.show', $user->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        // Eliminar el animal de la base de datos
        $user->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('user.index')->with("success", "Animal deleted successfully");
    }
}
