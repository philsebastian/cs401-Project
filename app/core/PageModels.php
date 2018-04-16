<?php
session_start();

class PageModels extends Models
{
    protected $content;
    protected $primarynav;
    protected $controlnav;
    protected $glyphs;
    protected $rootpath;

    public function __construct($name, $primary, $control, $glyphs, $rootpath)
    {
        $this->content = [];
        $this->primarynav = $primary;
        $this->controlnav = $control;
        $this->glyphs = $glyphs;
        $this->rootpath = $rootpath;
        parent::__construct($name);
    }

    public function GetData($content)
    {
        $headingLinks = ['primarynav' => $this->primarynav, 'controlnav' => $this->controlnav, 'glyphs' => $this->glyphs, 'rootpath' => $this->rootpath];
        $data = array_merge(parent::GetData($content), $headingLinks);
        return $data;
    }

    public function GetRandomContent()
    {
        $content = array("main" . DS . "_randomcontents");
        $int = rand(0, 10);
        for($i = 0; $i < $int; $i++)
        {
            array_push($content, "main" . DS . "_randomcontents");
        }
        return $content;
    }
}