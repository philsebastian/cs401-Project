<?php

class Contact extends MainModel
{
    public function __construct()
    {
        parent::__construct('contact');
    }
    public function GetData()
    {
        $data = parent::GetData();
        $content = array('contents' => $this->GetRandomContent());
        $data = array_merge($data, $content);

        return $data;
    }
}