<?php

class TeachersModel extends PageModels
{
    public function __construct($name)
    {
        $primary = ['account', 'appointments', 'notebook', 'students'];
        $control = ['logout'];
        $glyphs  = ['logout' => 'log-out'];
        parent::__construct($name, $primary,  $control, $glyphs, TEACHERROOT);
    }
}