<?php

namespace trivia\Http\Container;

class generalContainer
{

	private $title_name="Lista de usuarios activos";

	//USER INFORMATION
	private $username="No name detected";
	private $rol_id=-1;
	private $image="cms/images/img.jpg";

	//GENERAL FLAGS
	private $form=false;
	private $table=false;
	private $relative_path="";
	private $new_element=true;

	private $head_name = "Registrar";

	private $users=null;
	private $questions=null;


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