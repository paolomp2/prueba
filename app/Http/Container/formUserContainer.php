<?php

namespace trivia\Http\Container;

class formUserContainer
{

	private $create = true;

	//PAGE INFORMATION
	private $page_name = "Crear usuario";	

	//USER INFORMATION
	private $id = null;

	private $name = null;
	private $name_placeholder = "Ingrese el nombre";
	
	private $dni = null;
	private $dni_placeholder = "Ingrese el dni";

	private $email = null;
	private $email_placeholder = "Ingrese el email";

	private $password = null;
	private $password_placeholder = "Ingrese la contraseña";

	private $rol_id = 0;

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