<?php

class TeachModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('teach');
    }
    public function GetData($content)
    {
        $data = parent::GetData($content);
        $data = array_merge($data, $content);

        return $data;
    }
}