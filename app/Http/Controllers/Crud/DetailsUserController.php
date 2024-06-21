<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Crud\DetailsUser;
use Illuminate\Http\Request;

class DetailsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailsUsers = DetailsUser::with('user')->orderBy('user_id', 'ASC')->get();
        return view('crud.details_users.index', compact('detailsUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crud.details_users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'user_id' => 'required|integer',
            'age' => 'nullable|integer',
            'sex' => 'nullable|string',
            'location' => 'nullable|string'
        ]);

        $imageName=NULL;
        if($request->image!=NULL){

            $imageObject=$request->image;

            $imageExtension=$imageObject->getClientOriginalExtension();
            $newImageName=time().'.'.$imageExtension;

            $imageObject->move(public_path('crud/images'),$newImageName);

            $imageName=$newImageName;
        }

        $data['image']=$imageName;

        DetailsUser::create($data);

        return to_route('detailsUser.create')->with("success", "Successfully, bog was created");
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailsUser $detailsUser)
    {
        //
        return view('crud.details_users.show',[
            'detailsUser'=>$detailsUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailsUser $detailsUser)
    {
        //
        return view('crud.details_users.edit',[
            'detailsUser'=>$detailsUser
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailsUser $detailsUser)
    {
        //
        $data = $request->validate([
            'user_id' => 'required|integer',
            'age' => 'nullable|integer',
            'sex' => 'nullable|string',
            'location' => 'nullable|string'
        ]);

        $imageName=NULL;
        if($request->image!=NULL){

            $imageObject=$request->image;

            $imageExtension=$imageObject->getClientOriginalExtension();
            $newImageName=time().'.'.$imageExtension;

            $imageObject->move(public_path('crud/images'),$newImageName);

            $imageName=$newImageName;
            
            $data['image']=$imageName;
        }

        $detailsUser->update($data);

        return redirect()->route('detailsUser.show', $detailsUser->id)->with("success", "Successfully, brand was updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailsUser $detailsUser)
    {
        //
        $detailsUser->delete();

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('detailsUser.index')->with("success", "Animal deleted successfully");
    }
}
