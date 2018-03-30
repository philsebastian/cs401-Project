<?php

class MainModel extends PageModels
{
    public function __construct($name)
    {
        $leftLinks = ['home', 'learn', 'teach'];
        $rightLinks = ['signup', 'login'];
        $glyphs  = ['signup' => 'user', 'login' => 'log-in'];
        parent::__construct($name, $leftLinks,  $rightLinks, $glyphs, URLROOT);
    }

}