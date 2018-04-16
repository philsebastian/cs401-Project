<?php
session_start();

class MainModel extends PageModels
{
    public function __construct($name)
    {
        $primary = ['home', 'learn', 'teach'];
        $control = ['signup', 'login'];
        $glyphs  = ['signup' => 'user', 'login' => 'log-in'];
        parent::__construct($name, $primary,  $control, $glyphs, URLROOT);
    }

    public function GetData($content)
    {
        return parent::GetData($content);
    }
}