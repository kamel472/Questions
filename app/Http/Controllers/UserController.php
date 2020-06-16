<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth')->except( 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  User $user)
    {
        $name = $request->name;
        $email= $request->email;

        $request->validate([
            'name' => ['required'],
            'email' => ['required']
        ]);
        
        
        if($request->hasFile('image')){
        
        $image = $request->image;
        $fileName= $image->getClientOriginalName();
        $explode= explode(".",$fileName );
        $fileActualExt = strtolower(end($explode));
        $fileActualName= $explode[0];
        $fileUniqueName = $fileActualName.$user->name.'.'.$fileActualExt;

        $image->storeAs('images', $fileUniqueName , 'public');
            $user->update(['name'=>$name , 'email'=>$email , 'avatar'=>$fileUniqueName]);
        }
        
        else{

            $user->update(['name'=>$name , 'email'=>$email]);
        }
        
        return redirect()->back()->with('message' , 'data updated successfully');
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




