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
        $this->model('StudentNotebookModel');
        $this->loadView();
        echo $this->out();
    }

}