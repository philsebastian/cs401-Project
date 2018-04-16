<?php
session_start();

class StudentsTeachers extends StudentsController
{
    public function __construct()
    {
        parent::__construct("student teacher");
    }

    public function index()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "teacher" . DS . "_info"]);
            $this->model('StudentTeacherModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsTeacher.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    public function find()
    {
        // Submit changes here and redirect back to student/account/
    }
}