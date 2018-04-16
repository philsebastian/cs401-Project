<?php
session_start();

class Learn extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('learn');
    }

    public function index()
    {
        try
        {
            $this->model('LearnModel');
            $content = array('contents' => $this->data->GetRandomContent());
            $this->loadView(MAINCORE, $content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("Learn.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

}