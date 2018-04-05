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
        $this->model('StudentAppointmentModel');
        $this->loadView(STUDENTCORE);
        echo $this->out();
    }

}