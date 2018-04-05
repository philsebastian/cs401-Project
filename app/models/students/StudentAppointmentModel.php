<?php

class StudentAppointmentModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student appointments');
    }
    public function GetData()
    {
        $data = parent::GetData();
        $content = array('contents' => ["students" . DS . "_appointments"]);
        $data = array_merge($data, $content);
        return $data;
    }
}