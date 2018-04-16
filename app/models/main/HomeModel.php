<?php

class HomeModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('home');
    }
    public function GetData($content)
    {
        return parent::GetData($content);
    }
}