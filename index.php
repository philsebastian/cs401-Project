<?php
error_reporting(E_ERROR);

define(LOGLEVEL, 1);

define("NL", "\n");
define("DT", "\t");
define('DS', DIRECTORY_SEPARATOR);

define('ROOT', $_SERVER["SERVER_NAME"]);

define('BASE', __DIR__);
define('COMMON', "common");
define('CSS', COMMON . DS . "css");
define('JS', COMMON . DS . "javascript");
define('URLROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('STUDENTROOT', URLROOT . 'students/');
define('TEACHERROOT', URLROOT . 'teachers/');

require_once(BASE . DIRECTORY_SEPARATOR .'app' . DIRECTORY_SEPARATOR . 'init.php');