<?php
session_start();

class Contact extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("contact");
    }

    public function index()
    {
        try
        {
            $this->model('ContactModel');
            $content = array('contents' => $this->data->GetRandomContent());
            $this->loadView(MAINCORE, $content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("Contact.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

}