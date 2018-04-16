<?php
session_start();

class Login extends Controller
{
    public function __construct()
    {

        session_start();
        parent::__construct('login');
    }

    public function index()
    {
        try
        {
            if(isset($_SESSION['role']))
            {
                $session = new Session();
                $session->RedirectBasedOnRole();
            }
            else
            {
                $content = array('contents' => ["main" . DS . "_login"]);
                $this->model('LoginModel');
                $this->loadView(MAINCORE, $content);
                echo $this->out();
            }
        }
        catch (Exception $ex)
        {
            Logger::LogError("Login.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    public function authenticate()
    {
        try
        {
            if (isset($_POST['username']) && $_POST['username'] != "")
            {
                $username = $_POST['username'];
            }
            else
            {
                $_SESSION['errorMessage'] = "Missing email address. Please enter username to proceed.";
                exit(header("Location: " . URLROOT . "login/"));
            }
            if(isset($_POST['password']) && $_POST['password'] != "")
            {
                $password = $_POST['password'];
            }
            else
            {
                $_SESSION['errorMessage'] = "Missing password. Please enter password to proceed.";
                $_SESSION['presets']['username'] = $_POST['username'];
                exit(header("Location: " . URLROOT . "login/" ));
            }
            $session = new Session();
            $session->validateLogin($username, $password);
        }
        catch (Exception $ex)
        {
            Logger::LogError("Login.authenticate", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "login/"));
        }

    }

}