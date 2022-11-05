<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myUser = MyUser::all();
        return view('myusers', ['myusers' => $myUser]);
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
        $myUser = new MyUser;
        
        $myUser->name = request('name');
        $myUser->age = request('age');
        $myUser->email = request('email');
        $myUser->save();
        return redirect('/myusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function show(MyUser $myUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MyUser $myUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyUser $myUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, MyUser $myUser)
    {
        $myUser = MyUser::find($id);
        $myUser->delete();
        return redirect('/myusers'); 
    }
}