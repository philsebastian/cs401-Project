<?php

class Models
{
    protected $Doa;
    protected $modelName;

    public function __construct($name)
    {
        $this->modelName = $name;
    }

    public function GetData()
    {
        return ['name' => $this->modelName];
    }
}