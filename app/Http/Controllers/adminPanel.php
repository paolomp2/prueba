<?php

namespace trivia\Http\Controllers;

use Illuminate\Http\Request;

use trivia\Http\Requests;
use trivia\Http\Controllers\Controller;
use trivia\Http\Container\generalContainer;

use trivia\User;
use Auth;
use Session;

use Redirect;

class adminPanel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gc = new generalContainer;
        $gc->username = Auth::user()->name;
        return view('cms.dashboard.dashboard', compact('gc'));
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



        $user = User::where("dni",$request->dni)->where("email",$request->email)->first();

        //echo dd($user);

        if(count($user)!=0){
            Auth::login($user);
            
            return Redirect::to('/dashboard');
        }
            
        //redireccionamiento a la p'agina
        return Redirect::to('/');
    }
}
