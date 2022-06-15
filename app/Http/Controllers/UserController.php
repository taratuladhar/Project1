<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
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
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|unique:users,username',
            'password'=>'required|min:4|max:12|confirmed'
        ]);
        //data store gareko
        $data['username']=$request->username;
        $data['password']=  Hash::make($request->password); //password encrypt gareko
        User::create($data); //database ma insert garcha
        return redirect()->back()->with('success','User created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function login(Request $request)
    {
       
        if($request->isMethod('get'))
        {
            return view('login');
        }
        if($request->isMethod('post'))
        {
           
            $request->validate
            ([
                'username'=>'required',
                'password'=>'required'
            ]);
            
             if(Auth::attempt(['username'=>$request->username,'password'=>$request->password]))
        {
            Session::put('loggedin',true);
            return redirect('/');
        }
        else
        {
            return redirect()->route('login')->with('error','Username or Password is incorrect');
        }
        }

       
    }

    public function logout(){
        Session::flush();
        return redirect('login');

    }
}
