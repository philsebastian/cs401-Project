<?php

class StudentAppointmentModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('appointments');
    }
    public function GetData($content)
    {
        return parent::GetData($content);
    }
}