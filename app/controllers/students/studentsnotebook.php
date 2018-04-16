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
        $content = array('contents' => ["students" . DS . "notebook" . DS . "_notebook"]);
        $this->model('StudentNotebookModel');
        $this->loadView($content);
        echo $this->out();
    }

}