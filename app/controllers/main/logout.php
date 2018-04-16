<?php
session_start();

class Logout extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("logout");
    }

    public function index()
    {
        // Here is where i destroy the session
        // Reroute to a specific logout page??
        session_destroy();
        session_start();
        exit(header("Location: " . URLROOT . "home", true));
    }

}

?>