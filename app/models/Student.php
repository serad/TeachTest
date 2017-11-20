<?php

namespace App\Models;

class Student extends \Phalcon\Mvc\Model {

	public function initialize()
	{
		$this->setSource('Student');
	}

}
