<?php
session_start();

class Logger
{
    public static function LogTrace($location, $message)
    {
        if (LOGLEVEL <= 1)
        {
            $Dao = new Dao();
            $Dao->LogMessage("TRACE", $location, $message);
        }
    }
    public static function LogDebug($location, $message)
    {
        if (LOGLEVEL <= 2)
        {
            $Dao = new Dao();
            $Dao->LogMessage("DEBUG", $location, $message);
        }
    }
    public static function LogInfo($location, $message)
    {
        if (LOGLEVEL <= 3)
        {
            $Dao = new Dao();
            $Dao->LogMessage("INFO", $location, $message);
        }
    }
    public static function LogWarn($location, $message)
    {
        if (LOGLEVEL <= 4)
        {
            $Dao = new Dao();
            $Dao->LogMessage("WARN", $location, $message);
        }
    }
    public static function LogError($location, $message)
    {
        if (LOGLEVEL <= 5)
        {
            $Dao = new Dao();
            $Dao->LogMessage("ERROR", $location, $message);
        }
    }
    public static function LogFatal($location, $message)
    {
        if (LOGLEVEL <= 6)
        {
            $Dao = new Dao();
            $Dao->LogMessage("FATAL", $location, $message);
        }
    }
}