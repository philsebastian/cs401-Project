<?php

class TeacherAccountModel extends TeachersModel
{
    protected $Doa;
    protected $modelName;

    public function __construct()
    {
        parent::__construct('account');
    }

}