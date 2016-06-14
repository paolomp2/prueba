<?php

namespace trivia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table = 'questions';

    public function Answers()
    {
    	return $this->hasMany('trivia\Answer','id_question');
    }
}
