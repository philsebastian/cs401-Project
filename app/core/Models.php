<?php
session_start();

class Models
{
    protected $modelName;

    public function __construct($name)
    {
        $this->modelName = $name;
    }

    public function GetData()
    {
        if (isset($_SESSION['presets']))
        {
            unset($_SESSION['presets']);
        }
        return ['name' => $this->modelName, 'random' => rand(1, 10)];
    }
}