<?php

class Models
{
    protected $Doa;
    protected $modelName;
    protected $libraryLinks;

    public function __construct($name)
    {
        $this->modelName = $name;
        $this->libraryLinks = Builder::GetCssAndJs();

    }

    public function GetData()
    {
        return ['name' => $this->modelName, 'links' => $this->libraryLinks];
    }
}