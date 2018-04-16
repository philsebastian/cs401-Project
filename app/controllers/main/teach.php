<?php
session_start();

class Teach extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('teach');
    }

    public function index()
    {
        try
        {
            $this->model('TeachModel');
            $content = array('contents' => $this->data->GetRandomContent());
            $this->loadView(MAINCORE, $content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("Teach.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

}