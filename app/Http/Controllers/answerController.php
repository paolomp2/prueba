<?php

namespace trivia\Http\Controllers;

use Illuminate\Http\Request;

use trivia\Http\Requests;
use trivia\Http\Controllers\Controller;

use trivia\Http\Container\generalContainer;
use trivia\Http\Container\formAnswerContainer;
use Vinkla\Hashids\Facades\Hashids;
use Auth;

use trivia\User;
use trivia\Question;
use trivia\Answer;

use Redirect;

class answerController extends Controller
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
        $answer = Answer::find(Hashids::decode($id)[0]-1000);
        $fac = new formAnswerContainer;
        $fac->id =    $answer->id;
        $fac->id_md5 =    $answer->id_md5;
        $fac->letter =    $answer->letter;
        $fac->time =    $answer->time;
        $fac->value =    $answer->value;
        $fac->page_name = "Editar respuesta";

        $gc = new generalContainer;
        $gc->username = Auth::user()->name;

        return view('cms.answer.form', compact('gc','fac'));
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
        $answer = Answer::find($id);
        $answer->value = $request->value;
        $answer->save();

        $question = $answer->Question()->first();

        return Redirect::to('/question/'.$question->id_md5.'/edit');
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
