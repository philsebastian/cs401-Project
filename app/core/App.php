<?php

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if(isset($url[0]) && (strtolower($url[0]) == 'students' || strtolower($url[0]) == 'teachers'))
        {
            $url = $this->OtherPages($url);
        }
        else
        {
            $url = $this->MainPages($url);
        }

        $this->params = $url ? array_values($url) : [];
        $this->controller = new $this->controller();
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function MainPages(array $url)
    {
        if(isset($url[0]) && file_exists(MAINCONTROLLERS . DS . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }
        else
        {
            header("Location: " . URLROOT . "home", true);
            die();
        }

        if(isset($url[1]) && method_exists($this->controller, $url[1]))
        {
            $this->method = $url[1];
            unset($url[1]);
        }
        return $url;
    }

    protected function OtherPages(array $url)
    {
        $search = strtolower($url[0]);
        $search = ucfirst($search);
        unset($url[0]);
        $this->controller = $search . 'Account';

        if(isset($url[1]) && $this->ControllerExists($search . ucfirst(strtolower($url[1]))))
        {
            $this->controller = $search . $url[1];
            unset($url[1]);
        }
        else
        {
            header("Location: " . URLROOT . $search . '/Account', true);
            die();
        }

        if(isset($url[2]) && method_exists($this->controller, $url[2]))
        {
            $this->method = $url[2];
            unset($url[2]);
        }
        return $url;
    }

    protected function parseUrl()
    {
        $url = [];
        if (isset($_SERVER['REQUEST_URI']))
        {
            $url = explode('/', filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
        }
        return $url;
    }

    private function ControllerExists($name)
    {
        if (file_exists(STUDENTSCONTROLLERS . DS . $name . '.php') || file_exists(TEACHERSCONTROLLERS . DS . $name . '.php'))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

}