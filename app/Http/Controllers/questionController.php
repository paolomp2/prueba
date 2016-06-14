<?php

namespace trivia\Http\Controllers;

use Illuminate\Http\Request;

use trivia\Http\Requests;
use trivia\Http\Controllers\Controller;

use trivia\Http\Container\generalContainer;
use trivia\Http\Container\formQuestionContainer;
use Vinkla\Hashids\Facades\Hashids;
use Auth;

use trivia\User;
use trivia\Question;
use trivia\Answer;

use Redirect;

class questionController extends Controller
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
        $gc->questions = Question::all();

        foreach ($gc->questions as $question) {
            if($question->id_md5==""){
                $question->id_md5 = Hashids::encode($question->id+1000);
                $question->save();
            }
                
        }

        $gc->table = true;
        $gc->title_name = "Lista de preguntas";
        return view('cms.question.questions_list', compact('gc'));
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
        $question = Question::find(Hashids::decode($id)[0]-1000);
        $fqc = new formQuestionContainer;
        $fqc->id =    $question->id;
        $fqc->id_md5 =    $question->id_md5;
        $fqc->total_score =    $question->total_score;
        $fqc->num_options =    $question->num_options;
        $fqc->statement =    $question->statement;
        $fqc->number =    $question->number;
        $fqc->letter =    $question->letter;
        $fqc->page_name = "Editar pregunta";
        $fqc->create = false;
        $fqc->answers = $question->Answers()->get();

        foreach ($fqc->answers as $answer) {
            if($answer->id_md5==""){
                $answer->id_md5 = Hashids::encode($answer->id+1000);
                $answer->save();
            }
                
        }

        $gc = new generalContainer;
        $gc->username = Auth::user()->name;
        $gc->table = true;

        return view('cms.question.form', compact('gc','fqc'));
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
        $question = Question::find($id);
        $question->statement = $request->statement;
        $question->save();

        return Redirect::to('/question');
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
