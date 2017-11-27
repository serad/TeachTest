<?php

namespace App\Controllers;

use App\Models\Course;

class CourseController extends \Phalcon\Mvc\Controller
{

        public function indexAction()
        {
		$courses = Course::find();
                $this->view->courses = $courses;

        }

	public function editAction( $courseId = null ) {
		if( $courseId )
		{
			$course = Course::findFirst( $courseId );
			if( !$course ) $this->view->course = new Course();
			else 
			{
				$this->view->course = $course;
				$this->view->edit = true;
			}
		}

	}

        public function newAction()
        {
                $courses = Course::find( [ 'active = 1', 'order' => 'startDate desc' ] );
                $this->view->courses = $courses;
        }

}
