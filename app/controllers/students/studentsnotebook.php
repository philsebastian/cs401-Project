<?php
session_start();

class studentsnotebook extends StudentsController
{
    public function __construct()
    {
        parent::__construct("student notebook");
    }

    public function index()
    {
        $content = array("students" . DS . "_notebook");
        $this->model('StudentNotebookModel');
        $this->loadView(STUDENTCORE, $content);
        echo $this->out();
    }

}