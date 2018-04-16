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

        if(isset($content['view']))
        {
            $displayInfo = self::GetViewData($content);
            $data = array_merge($data, $displayInfo);
        }

        return $data;
    }

    private function GetViewData($content)
    {
        $displayInfo = [];
        try
        {
            $part = $content['view'];
            $part = ucwords($part);
            $part = str_replace(' ', '', $part);
            $searchMethod = "Get{$part}Info";
            $displayInfo = self::$searchMethod();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsModel.GetViewData", "Error: {$ex->getMessage()}");
            $_SESSION['errorMessage'] = "Error retrieving data. Please try again.";
            exit(header("Location: " . STUDENTROOT));
        }
        return $displayInfo;
    }

    protected function GetProfileInfo()
    {
        //$session = new Session();
        return $this->session->GetMyUserAccountInfo($_SESSION['usernameId']);
    }
    protected function GetMyTeacherInfo()
    {
        //return $this->session->GetMyTeachers($_SESSION['usernameId']);
        return ['myteacher' => []];
    }
    protected function GetPaymentAccountInfo() // PHIL TODO -- to implement
    {
        return ['paymentaccount' => []];
    }
    protected function GetPaymentHistoryInfo() // PHIL TODO -- to implement
    {
        return ['paymenthistory' => []];
    }
    protected function GetUpcomingInfo()
    {
        return ['appointments' => []];
    }
    protected function GetHistoryInfo()
    {
        return ['history' => []];
    }
    protected function GetScheduleInfo()
    {
        return ['schedule' => []];
    }
}