<?php

class StudentAccountModel extends Models
{
    protected $Doa;
    protected $modelName;

    public function __construct()
    {
        parent::__construct('account');
    }

}