<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\Course;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
//		$stStudent = Student::findFirst();
		$this->view->title = 'Indice';
	}
	
	public function coursesAction()
	{
		$courses = Course::find( [ 'active = 1', 'order' => 'startDate desc' ] );
		$this->view->courses = $courses;
	}
	
	public function contactAction()
	{

	}
	public function logoutAction() {
		$this->session->destroy();
	}

}
