<?php

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

    public function GetData()
    {
        $headingLinks = ['primarynav' => $this->primarynav, 'controlnav' => $this->controlnav, 'glyphs' => $this->glyphs, 'rootpath' => $this->rootpath];
        $data = array_merge(parent::GetData(), $headingLinks);
        return $data;
    }
}