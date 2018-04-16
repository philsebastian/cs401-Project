<?php
session_start();

class Home extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("home");
    }

    public function index()
    {
        try
        {
            $this->model('HomeModel');
            $content = array('contents' => $this->data->GetRandomContent());
            $this->loadView(MAINCORE, $content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("Home.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

}