<?php

class LearnModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('learn');
    }
    public function GetData()
    {
        $data = parent::GetData();
        $content = array('contents' => $this->GetRandomContent());
        $data = array_merge($data, $content);

        return $data;
    }
}