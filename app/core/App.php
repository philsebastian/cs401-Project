<?php
session_start();

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
    }

    private function GoToPage()
    {
        $this->controller = new $this->controller();
        call_user_func_array([$this->controller, $this->method], array($this->params));
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
            exit(header("Location: " . URLROOT . "home"));
        }

        if(isset($url[1]) && method_exists($this->controller, $url[1]))
        {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = [];

        if(count($url) > 0)
        {
            $this->params = array_values($url);
            $_SESSION['params'] = $this->params;
            $method = ($this->method != "index") ? $this->method : "";

            exit(header("Location: " . URLROOT . $this->controller . "/" . $method));

        }

        $this->GoToPage();
    }

    protected function OtherPages(array $url)
    {
        $search = strtolower($url[0]);
        $search = ucfirst($search);
        unset($url[0]);
        $this->controller = $search . 'Account';



        if(isset($url[1]) && $this->ControllerExists($search . strtolower($url[1])))
        {
            $controller = $url[1];
            $this->controller = $search . $url[1];
            unset($url[1]);
        }
        else
        {
            exit(header("Location: " . URLROOT . $search . '/Account'));
        }

        if(isset($url[2]) && method_exists($this->controller, $url[2]))
        {
            $this->method = $url[2];
            unset($url[2]);
        }

        $this->params = [];

        if(count($url) > 0)
        {
            $this->params = array_values($url);
            $_SESSION['params'] = $this->params;
            $method = ($this->method != "index") ? $this->method : "";

            exit(header("Location: " . URLROOT . $search . "/" . $controller . "/" . $method));
        }

        $this->GoToPage();
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