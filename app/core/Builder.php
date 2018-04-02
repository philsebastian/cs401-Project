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
        $footer = '<div>' . NL;
        $footer .= '<nav class="navbar navbar-inverse bg-inverse min-navbar">' . NL;
        $footer .= '<div class="container-fluid  max-navbar">' . NL;
        $footer .= '<div class="navbar-collapse collapse">' . NL;
        $footer .= '<ul class="nav navbar-nav">' . NL;
        $footer .= '<li><a href="../navbar-static-bottom/" class="disabled">&#169; 2018</a></li>' . NL;
        $footer .= '</ul>' . NL;
        $footer .= '<ul class="nav navbar-nav navbar-right">' . NL;
        $footer .= '<li id="contact"><a href="' . URLROOT . COMMON . '/' . 'contact">Contact us</a></li>' . NL;
        $footer .= '</ul>' . NL;
        $footer .= '</div>' . NL;
        $footer .= '</div>' . NL;
        $footer .= '</nav>' . NL;
        $footer .= '</div>' . NL;
        return $footer;
    }

    public static function GetHeading (array $data)
    {
        //  PHIL TODO -- what about contact us -- if you go to contact then what if you were signed in

        $primarynav = $data['primarynav'];
        $controlnav = $data['controlnav'];
        $glyphs = $data['glyphs'];
        $rootpath = $data['rootpath'];

        $links = '<div>' . NL;
        $links .= '<nav class="navbar navbar-inverse bg-inverse min-navbar">' . NL;
        $links .= '<div class="container-fluid  max-navbar">' . NL;
        $links .= '<div class="navbar-header">' . NL;
        $links .= '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">' . NL;
        $links .= '<span class="sr-only">Toggle navigation</span>' . NL;
        $links .= '<span class="icon-bar"></span>' . NL;
        $links .= '<span class="icon-bar"></span>' . NL;
        $links .= '<span class="icon-bar"></span>' . NL;
        $links .= '</button>' . NL;
        $links .= '<a class="navbar-brand" href="' . $rootpath . '">' . NL;
        $links .= '<img src="' . URLROOT . COMMON . '/' . 'favicon.ico" width="25" height="25" class="d-inline-block greyimg align-top" alt="" />Music Lessons' . NL;
        $links .= '</a>' . NL;
        $links .= '</div>' . NL;
	    $links .= '<div id="navbar" class="navbar-collapse collapse">' . NL;
        $links .= '<ul class="nav navbar-nav">' . NL;

	    foreach($primarynav as $index => $name)
	    {
		    $links .= '<li id="' . $name . '"';
            if ($data['name'] == $name)
            {
                $links .= ' class="active"';
            }
            $links .= '>' . NL;
		    $links .= '<a href="' . $rootpath . $name . '/">' . ucwords($name) . '</a>' . NL;
		    $links .= "</li>" . NL;
	    }

	    $links .= '</ul>' . NL;
        $links .= '<ul class="nav navbar-nav navbar-right">' . NL;

	    foreach($controlnav as $index => $name)
	    {
		    $links .= '<li id="' . $name . '"';
            if ($data['name'] == $name)
            {
                $links .= ' class="active"';
            }
            $links .= '>' . NL;
            $links .= '<a href="' . URLROOT . $name . '/">';
		    $links .= '<span class="glyphicon glyphicon-' . $glyphs[$name] .  '"></span> ' . ucwords($name) . '</a>' . NL;
		    $links .= "</li>" . NL;
	    }

	    $links .= '</ul>' . NL;
	    $links .= '</div>' . NL;
        $links .= '</div>' . NL;
        $links .= '</nav>' . NL;
        $links .= '</div>' . NL;

	    return $links;
    }


}

?>