<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user-index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-create')->with(["roles"=>Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO rules
        $data = $request->all();
        $request->validate([
            'email' => ['unique:users,email','email'],
            'password' => ['min:4','confirmed']
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->roles()->sync(Role::where('name',$data['role'])->pluck('id'));
        return redirect(route('user'))->with(['msg'=>'user added successfully']);


    

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('user-edit')->with(['user'=>$user,"roles"=>Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $data = $request->all();
        $request->validate([

            'password' => ['min:4','confirmed']
        ]);

        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        $user->roles()->sync(Role::where('name',$data['role'])->pluck('id'));

        return redirect(route('user'))->with(['msg'=>'user updated successfully']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {

        if(sizeof($user->orders) == 0){
            $user->destroy($user->id);
            return redirect(route('user'))->with(['msg'=>'user Deleted Successfully']);
        }
        else {
            return redirect(route('user'))->with(['error'=>'Cannot Delete user']);
        }



    }
}
