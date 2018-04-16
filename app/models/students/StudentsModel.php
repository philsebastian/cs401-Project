<?php

class StudentsModel extends PageModels
{
    protected $session;

    public function __construct($name)
    {
        $this->session = new Session();  // PHIL TODO -- initialize with usernameId??
        $primary = ['account', 'appointments', 'notebook', 'teachers'];
        $control = ['logout'];
        $glyphs  = ['logout' => 'log-out'];
        parent::__construct($name, $primary,  $control, $glyphs, STUDENTROOT);
    }
 
    public function GetData($content)
    {
        return parent::GetData($content);
    }

    public function GetMyStudentAccountInfo()
    {
        //$session = new Session();
        return $this->session->GetMyUserAccountInfo($_SESSION['usernameId']);
    }
    public function GetMyTeachers()
    {
        return $this->session->GetMyTeachers($_SESSION['usernameId']);
    }
}