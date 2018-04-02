<?php
session_start();

class Signup extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('signup');
    }

    public function index()
    {
        $content = array("main" . DS . "_signup");
        $this->model('SignupModel');
        $this->loadView(MAINCORE, $content);
        echo $this->out();
    }

    public function addnew()
    {
        if (isset($_POST))
        {
            $loginInfo = $_POST;
            $echoString = "<pre>" . print_r($loginInfo) . "</pre>";
        }
        else
        {
            $echoString = "NO POST INFORMATION";
        }
        return $echoString;
    }

}