<?php

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
        // Reroute to a page??
        header("Location: " . URLROOT . "home", true);
        die();
    }

}

?>