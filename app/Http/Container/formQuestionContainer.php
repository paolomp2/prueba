<?php

namespace trivia\Http\Container;

class formQuestionContainer
{

	private $create = true;

	//PAGE INFORMATION
	private $page_name = "Editar Pregunta";	

	//Question INFORMATION
	private $id = null;
	private $id_md5 = null;
	private $statement = null;
	private $total_score = null;
	private $number = null;
	private $letter = null;
	private $num_options = null;

	private $answers = array();
	
	public function __get($property) {
	    if (property_exists($this, $property)) {
	  		return $this->$property;
	    }
	}

	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}

		return $this;
	}
}
?>