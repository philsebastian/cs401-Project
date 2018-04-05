<?php

class HomeModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('home');
    }
    public function GetData()
    {
        $data = parent::GetData();
        $content = array('contents' => $this->GetRandomContent());
        $data = array_merge($data, $content);

        return $data;
    }
}