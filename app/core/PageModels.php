<?php

class PageModels extends Models
{
    protected $leftNames;
    protected $rightNames;
    protected $glyphs;
    protected $rootpath;

    public function __construct($name, $left, $right, $glyphs, $rootpath)
    {
        $this->leftNames = $left;
        $this->rightNames = $right;
        $this->glyphs = $glyphs;
        $this->rootpath = $rootpath;
        parent::__construct($name);
    }

    public function GetData()
    {
        $headingLinks = ['leftNames' => $this->leftNames, 'rightNames' => $this->rightNames, 'glyphs' => $this->glyphs, 'rootpath' => $this->rootpath];
        return array_merge(parent::GetData(), $headingLinks);
    }
}