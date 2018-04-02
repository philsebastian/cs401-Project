<?php

class StudentsModel extends PageModels
{
    public function __construct($name)
    {
        $primary = ['account', 'appointments', 'notebook'];
        $control = ['logout'];
        $glyphs  = ['logout' => 'log-out'];
        parent::__construct($name, $primary,  $control, $glyphs, STUDENTROOT);
    }

    public function GetMyStudentAccountInfo()
    {
        $session = new Session();
        return $session->GetMyUserAccountInfo($_SESSION['usernameId']);
    }
}