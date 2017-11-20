<?php

namespace App\Controllers;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$stStudent = \App\Models\Student::findFirst();
		$this->view->title = $stStudent->name;
	}


}
