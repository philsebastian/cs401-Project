<?php

class StudentNotebookModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student notebook');
    }
    public function GetData()
    {
        $data = parent::GetData();
        $content = array('contents' => ["students" . DS . "_notebook"]);

        $data = array_merge($data, $content);

        return $data;
    }
}