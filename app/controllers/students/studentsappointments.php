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
        $content = array('contents' => ["students" . DS . "appointments" . DS . "_appointments"]);

        $this->model('StudentAppointmentModel');
        $this->loadView($content);
        echo $this->out();
    }

}