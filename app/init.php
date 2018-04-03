<?php

define('DIR', __DIR__);
define('CORE', DIR . DS . 'core');

define('CONTROLLERS', DIR . DS . 'controllers');
define('MAINCONTROLLERS', CONTROLLERS . DS . 'main');
define('STUDENTSCONTROLLERS', CONTROLLERS . DS . 'students');
define('TEACHERSCONTROLLERS', CONTROLLERS . DS . 'teachers');

define('MODELS', DIR . DS . 'models');
define('MAINMODELS', MODELS . DS . 'main');
define('STUDENTSMODELS', MODELS . DS . 'students');
define('TEACHERSMODELS', MODELS . DS . 'teachers');

define('VIEWS', DIR . DS . 'views');
define("MAINCORE", "main" . DS . "main_core");
define("STUDENTCORE", "students" . DS . "students_core");
define("TEACHERCORE", "teacher" . DS . "teachers_core");

define('AUTOLOAD_CLASSES', serialize(array(MAINCONTROLLERS, STUDENTSCONTROLLERS, TEACHERSCONTROLLERS, CORE, MODELS, MAINMODELS, STUDENTSMODELS, TEACHERSMODELS, VIEWS)));

define('MAINHEADER', VIEWS . DS . 'main' . DS .'header.php');
define('MAINFOOTER', VIEWS . DS . 'main' . DS .'footer.php');

define('STUDENTHEADER', VIEWS . DS . 'students' . DS .'header.php');
define('STUDENTFOOTER', VIEWS . DS . 'students' . DS .'footer.php');

define('TEACHERHEADER', VIEWS . DS . 'teachers' . DS .'header.php');
define('TEACHERFOOTER', VIEWS . DS . 'teachers' . DS .'footer.php');

require_once(CORE . DS . "Logger.php");
require_once(CORE . DS . "Dao.php");
require_once(CORE . DIRECTORY_SEPARATOR . 'Autoloader.php');

$app = new App();