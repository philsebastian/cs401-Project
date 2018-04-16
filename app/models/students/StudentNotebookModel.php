<?php

class StudentNotebookModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('notebook');
    }
    public function GetData($content)
    {
        return parent::GetData($content);
    }
}