<?php

namespace trivia;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

	protected $dates = ['deleted_at'];
    protected $table = 'answers';

    public function Question()
    {
    	return $this->belongsTo('trivia\Question','id_question');
    }
}
