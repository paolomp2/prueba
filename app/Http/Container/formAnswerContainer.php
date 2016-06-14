<?php

namespace trivia\Http\Container;

class formAnswerContainer
{
	//PAGE INFORMATION
	private $page_name = "Editar Respuesta";	

	//Question INFORMATION
	private $id = null;
	private $id_md5 = null;
	private $value = null;
	private $letter = null;
	private $score = null;
	private $time = null;
	
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