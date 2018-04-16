<?php
session_start();

class Models
{
    protected $modelName;

    public function __construct($name)
    {
        $this->modelName = $name;
    }

    public function GetData($content = [])
    {
        if (isset($_SESSION['presets']))
        {
            unset($_SESSION['presets']);
        }
        $data = ['name' => $this->modelName, 'random' => rand(1, 10)];
        $data = array_merge($data, $content);
        return $data;
    }
}