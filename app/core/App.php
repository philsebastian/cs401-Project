<?php
session_start();

class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        try
        {
            Logger::LogTrace("App.__contruct", "App started.");

            $url = $this->parseUrl();

            if(isset($url[0]) && (strtolower($url[0]) == 'students' || strtolower($url[0]) == 'teachers'))
            {
                Logger::LogTrace("App.__construct", "Routing to other pages: {$url[0]}");
                $url = $this->OtherPages($url);
            }
            else
            {
                Logger::LogTrace("App.__construct", "Routing to main pages.");
                $url = $this->MainPages($url);
            }
        }
        catch (Exception $ex)
        {
            Logger::LogError("App.__construct", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    private function GoToPage()
    {
        try
        {
            Logger::LogTrace("App.GoToPage", "Initializing controller and method.");
            $this->controller = new $this->controller();
            call_user_func_array([$this->controller, $this->method], array($this->params));
        }
        catch (Exception $ex)
        {
            Logger::LogError("App.GoToPage", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }

    }

    protected function MainPages(array $url)
    {
        try
        {

            if(isset($url[0]) && file_exists(MAINCONTROLLERS . DS . $url[0] . '.php'))
            {
                Logger::LogTrace("App.MainPages", "url[0]: {$url[0]}.");
                $this->controller = $url[0];
                unset($url[0]);
            }
            else
            {
                Logger::LogTrace("App.MainPages", "Fixing URL: " . print_r($url, true));
                exit(header("Location: " . URLROOT . "home"));
            }

            if(isset($url[1]) && method_exists($this->controller, $url[1]))
            {
                Logger::LogTrace("App.MainPages", "url[1]: {$url[1]}.");
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = [];

            if(count($url) > 0)
            {
                $this->params = array_values($url);
                Logger::LogDebug("App.MainPages", "Parameters found. Controller: {$this->controller}, Method: {$this->method}, Parameters: {$this->params}");

                $_SESSION['params'] = $this->params;
                $method = ($this->method != "index") ? $this->method : "";

                Logger::LogTrace("App.MainPages", "Re-routing to default landing of: {$this->controller}.");
                exit(header("Location: " . URLROOT . $this->controller . "/" . $method));
            }

            Logger::LogDebug("App.MainPages", "No parameters in URL. Controller: {$this->controller}, Method: {$this->method}" . ((isset($_SESSION['params']) ? "Parameters in session: " . print_r($_SESSION['params'], true) : "")));

            $this->GoToPage();
        }
        catch (Exception $ex)
        {
            Logger::LogError("App..MainPages", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }

    }

    protected function OtherPages(array $url)
    {
        try
        {
            Logger::LogTrace("App.OtherPages", "Starting parse of {$url[0]}.");
            $search = strtolower($url[0]);
            $search = ucfirst($search);
            unset($url[0]);
            $this->controller = $search . 'Account';

            if(isset($url[1]) && $this->ControllerExists($search . ucfirst(strtolower($url[1]))))
            {
                $controller = $url[1];
                $this->controller = $search . $url[1];
                Logger::LogTrace("App.OtherPages", "Controller based on url: {$this->controller}.");
                unset($url[1]);
            }
            else
            {
                Logger::LogTrace("App.OtherPages", "Re-routing to default landing of: {$search}.");
                exit(header("Location: " . URLROOT . $search . '/Account'));
            }

            if(isset($url[2]) && method_exists($this->controller, $url[2]))
            {
                $this->method = $url[2];
                Logger::LogTrace("App.OtherPages", "Method based on url: {$this->method}.");
                unset($url[2]);
            }

            $this->params = [];

            if(count($url) > 0)
            {
                $this->params = array_values($url);
                $_SESSION['params'] = $this->params;
                Logger::LogDebug("App.OtherPages", "Parameters found. Controller: {$this->controller}, Method: {$this->method}, Parameters: {$this->params}");

                $method = ($this->method != "index") ? $this->method : "";

                Logger::LogTrace("App.OtherPages", "Re-routing to default landing of: {$this->controller}.");
                exit(header("Location: " . URLROOT . $search . "/" . $controller . "/" . $method));
            }

            $this->GoToPage();
        }
        catch (Exception $ex)
        {
            Logger::LogError("App.OtherPages", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
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