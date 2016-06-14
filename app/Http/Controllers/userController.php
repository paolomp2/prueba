<?php

namespace trivia\Http\Controllers;

use Illuminate\Http\Request;

use trivia\Http\Requests;
use trivia\Http\Controllers\Controller;

use trivia\Http\Container\generalContainer;
use trivia\Http\Container\formUserContainer;
use Vinkla\Hashids\Facades\Hashids;
use Auth;

use trivia\User;

use Redirect;
class userController extends Controller
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
        $gc->users = User::where("rol_id","<>",1)->get();
        $gc->table = true;
        return view('cms.user.active_users', compact('gc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gc = new generalContainer;
        $gc->username = Auth::user()->name;

        $fuc = new formUserContainer;

        return view('cms.user.create', compact('gc','fuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->save();
        $user->id_md5 = Hashids::encode($user->id+1000);

        $user->save();

        return Redirect::to('/active_users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(Hashids::decode($id)[0]-1000);
        $fuc = new formUserContainer;
        $fuc->id =    $user->id;
        $fuc->name =    $user->name;
        $fuc->email =    $user->email;
        $fuc->dni =    $user->dni;
        $fuc->page_name = "Editar usuario";
        $fuc->create = false;

        $gc = new generalContainer;
        $gc->username = Auth::user()->name;

        return view('cms.user.create', compact('gc','fuc'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->save();

        return Redirect::to('/active_users');
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

    public function inactive($id)
    {
        $user = User::find(Hashids::decode($id)[0]-1000);
        $user->delete();

        return Redirect::to('/active_users');
    }

    public function trashed()
    {
        $gc = new generalContainer;
        $gc->username = Auth::user()->name;        
        $gc->users = User::onlyTrashed()->get();
        $gc->table = true;
        $gc->title_name = "Lista de usuarios inactivos";
        return view('cms.user.active_users', compact('gc'));
    }

    public function untrashed($id)
    {
        User::onlyTrashed()->find(Hashids::decode($id)[0]-1000)->restore();
        return Redirect::to('/inactive_users');
    }

}
