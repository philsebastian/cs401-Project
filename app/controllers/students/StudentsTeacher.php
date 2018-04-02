<?php
session_start();

class StudentsTeacher extends StudentsController
{
    public function __construct()
    {
        parent::__construct("student teacher");
    }

    public function profile()
    {
        $content = array("students" . DS . "_teacherprofile");
        $this->model('StudentTeacherModel');
        $this->loadView(STUDENTCORE, $content);
        echo $this->out();
    }

    public function find()
    {
        // Submit changes here and redirect back to student/account/
    }
}