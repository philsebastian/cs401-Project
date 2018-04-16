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
        try
        {
            $content = array('contents' => ["students" . DS . "appointments" . DS . "_appointments"], 'view' => 'upcoming');
            $this->model('StudentAppointmentModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {

        }
    }

    public function history()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "appointments" . DS . "_history"], 'view' => 'history');
            $this->model('StudentAppointmentModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {

        }
    }

    public function schedule()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "appointments" . DS . "_schedule"], 'view' => 'schedule');
            $this->model('StudentAppointmentModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {

        }
    }

}