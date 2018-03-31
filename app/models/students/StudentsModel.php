<?php

class StudentsModel extends PageModels
{
    public function __construct($name)
    {
        $leftLinks = ['account', 'appointments', 'notebook'];
        $rightLinks = ['logout'];
        $glyphs  = ['logout' => 'log-out'];
        parent::__construct($name, $leftLinks,  $rightLinks, $glyphs, STUDENTROOT);
    }
}