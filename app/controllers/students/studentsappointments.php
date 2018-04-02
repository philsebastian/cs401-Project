<?php
session_start();

class StudentsAppointments extends StudentsController
{
    public function __construct()
    {
        parent::__construct("student appointments");
    }

    public function index()
    {
        $content = array("students" . DS . "_appointments");
        $this->model('StudentAppointmentModel');
        $this->loadView(STUDENTCORE, $content);
        echo $this->out();
    }

}