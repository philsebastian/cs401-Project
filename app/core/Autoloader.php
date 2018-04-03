<?php
session_start();

function loader($class)
{
    Logger::LogTrace("Autoloader.loader", "Looking for {$class}.");

    $class_file = DIR . DS . $class . '.php';
    Logger::LogTrace("Autoloader.loader", "Looking for {$class_file}.");
    if (file_exists($class_file))
    {
        Logger::LogDebug("Autoloader.loader", "{$class_file} found.");
        require_once($class_file);
    }
    else
    {
        Logger::LogTrace("Autoloader.loader", "{$class_file} not found.");
        foreach (unserialize(AUTOLOAD_CLASSES) as $path)
        {
            $class_file = $path . DS . $class . '.php' ;
            Logger::LogTrace("Autoloader.loader", "Looking for {$class_file}.");
            if (file_exists($class_file))
            {
                Logger::LogDebug("Autoloader.loader", "{$class_file} found.");
                require_once($class_file);
            }
        }
    }
}

spl_autoload_register('loader');