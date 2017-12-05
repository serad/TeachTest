<?php

namespace App\Controllers;

use App\Models\Course;
use Phalcon\Http\Request;

class CourseController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $courses = Course::find();
        $this->view->courses = $courses;
    }

    public function listAction()
    {
        $courses = Course::find();
        $this->view->courses = $courses;
    }

    public function editAction($courseId = null)
    {
        if ($courseId) {
            $course = Course::findFirst($courseId);
            if (!$course) {
                $this->view->course = new Course();
            } else {
                $this->view->course = $course;
                $this->view->edit = true;
            }
        }

    }
    public function saveAction()
    {
        $request = new Request(); // Check whether the request was made with method POST
        if ($request->isPost()) { // Check whether the request was made with Ajax
            if ($request->isAjax()) {
                $requestCourse = $request->getPost("course");
                $course = null;
                if ($requestCourse['id'] != '' && $requestCourse['id'] != '0') {
                    $course = Course::findFirst($requestCourse['id']);
                }
                $course = $course ?: new Course();
                $course->courseName = $requestCourse['courseName'];
                $course->definition = $requestCourse['definition'];

                $startDate = new \DateTime();
                $startDate = $startDate->setTimeStamp(strtotime($requestCourse['startDate']));
                $course->startDate = $startDate->format('Y-m-d H:i:s');
                $endDate = new \DateTime();
                $endDate = $endDate->setTimeStamp(strtotime($requestCourse['endDate']));
                $endDate = $endDate->format('Y-m-d H:i:s');
                $course->endDate = $endDate;

                $course->level = $requestCourse['level'];
                $course->active = $requestCourse['active'];
                try {
                    $course->save();
                    return json_encode(['result' => 'ok']);
                } catch (\Exception $e) {
                    return json_encode(['result' => 'error', 'message' => $e->getMessage()]);
                }
            };
        } else {
            $this->dispatcher->forward([
                'controller' => 'errors',
                'action' => 'show404',
            ]);
        }
    }

    public function newAction()
    {
        $courses = Course::find(['active = 1', 'order' => 'startDate desc']);
        $this->view->courses = $courses;
    }

}
