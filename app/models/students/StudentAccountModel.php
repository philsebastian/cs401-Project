<?php

class StudentAccountModel extends StudentsModel
{
    protected $Doa;
    protected $modelName;

    public function __construct()
    {
        parent::__construct('account');
    }

}