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

        $data = ['name' => $this->modelName, 'random' => rand(1, 10)];
        if (isset($_SESSION['presets']))
        {
            $data = array_merge($data, $_SESSION['presets']);
            unset($_SESSION['presets']);
        }
        $data = array_merge($data, $content);
        return $data;
    }
}