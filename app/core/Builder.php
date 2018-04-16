<?php

class Builder
{
    public static function IncludePartialView($partialView, array $data)
    {
        ob_start();

        include VIEWS . DS . $partialView . '.php';
        include $view_file;

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    // PHIL TODO -- change these to partial views
    public static function GetCssAndJs()
    {
        return  self::GetJs() . self::GetCss();
    }

    private static function GetCss()
    {
        $styles = "";
        $files = scandir(BASE . DS .CSS);

        foreach ($files as $file)
        {
            if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0)
            {
                $location = CSS . DS . $file;
                $location = str_replace(DS, '/', $location);
                $styles .= DT . '<link rel="stylesheet" href="' . URLROOT . $location . '">' . NL;
            }
        }
        return $styles;
    }

    private static function GetJs()
    {
        $scripts = "";

        $location = JS . DS .'jquery-3.1.1.js';
        $location = str_replace(DS, '/', $location);

        $scripts .= '<script src="https://code.jquery.com/jquery-3.3.1.js"></script>' . NL;
        $scripts .= DT . '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>' . NL;

        $files = scandir(BASE . DS .JS);

        foreach ($files as $file)
        {
            if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0)
            {
                $location = JS . DS . $file;
                $location = str_replace(DS, '/', $location);
                $scripts .= DT . '<script src="' . URLROOT . $location . '"></script>' . NL;
            }
        }
        return $scripts;
    }

    public static function GetCommonFooter()
    {
        return Builder::IncludePartialView("shared" . DS . "_footer", []);
    }

    public static function GetHeading (array $data)
    {
        return Builder::IncludePartialView("shared" . DS . "_heading", $data);
    }

    public static function GetNavigation(array $data)
    {
        return Builder::IncludePartialView("shared" . DS . "_secondarynavigation", $data);
    }
}

?>