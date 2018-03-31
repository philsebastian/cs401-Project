<?php

class TeachersModel extends PageModels
{
    public function __construct($name)
    {
        $leftLinks = ['account', 'appointments', 'notebook', 'students'];
        $rightLinks = ['logout'];
        $glyphs  = ['logout' => 'log-out'];
        parent::__construct($name, $leftLinks,  $rightLinks, $glyphs, TEACHERROOT);
    }
}