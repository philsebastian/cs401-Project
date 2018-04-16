<?php

class StudentsModel extends PageModels
{
    protected $session;

    public function __construct($name)
    {
        $this->session = new Session();  // PHIL TODO -- initialize with usernameId??
        $primary = ['account', 'appointments', 'notebook', 'teachers'];
        $control = ['logout'];
        $glyphs  = ['logout' => 'log-out'];
        parent::__construct($name, $primary,  $control, $glyphs, STUDENTROOT);
    }

    public function GetData($content)
    {
        $data = parent::GetData($content);

        $part = $content['view'];
        $part = ucwords($part);
        $part = str_replace(' ', '', $part);
        $searchMethod = "GetMy{$part}Info";
        $displayInfo = self::$searchMethod();

        $data = array_merge($data, $displayInfo);

        return $data;
    }

    protected function GetMyProfileInfo()
    {
        //$session = new Session();
        return $this->session->GetMyUserAccountInfo($_SESSION['usernameId']);
    }
    protected function GetMyTeacherInfo()
    {
        //return $this->session->GetMyTeachers($_SESSION['usernameId']);
        return ['myteacher' => []];
    }
    protected function GetMyPaymentAccountInfo() // PHIL TODO -- to implement
    {
        return ['paymentaccount' => []];
    }
    protected function GetMyPaymentHistoryInfo() // PHIL TODO -- to implement
    {
        return ['paymenthistory' => []];
    }
}