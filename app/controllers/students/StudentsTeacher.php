<?php
session_start();

class StudentsTeacher extends Controller
{
    protected $content;

    public function __construct()
    {
        parent::__construct("student teacher");
    }

    public function profile()
    {
        $this->model('StudentTeacherModel');
        $this->loadView("students" . DS . "core", $this->content);
        echo $this->out();
    }

    public function find()
    {
        // Submit changes here and redirect back to student/account/
    }   
}