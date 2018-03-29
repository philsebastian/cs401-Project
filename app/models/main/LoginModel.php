<?php

class LoginModel extends Models
{
    protected $Doa;
    protected $modelName;

    public function __construct()
    {
        parent::__construct('login');
    }
}