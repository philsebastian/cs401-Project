<?php

class StudentAppointmentModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('appointments');
    }
    public function GetData($content)
    {
        $data = parent::GetData($content);

        $tabcontent = array("tabs" => ["upcoming" => "appointments", "history" => "appointments/history", "schedule" => "appointments/schedule"]);

        $data = array_merge($data, $tabcontent);

        return $data;
    }
}