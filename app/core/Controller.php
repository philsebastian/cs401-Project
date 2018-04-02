<?php
session_start();

class Controller
{
    protected $name;
    protected $data;

    public function __construct($name)
    {
        $this->name = $name;
    }

    protected function model($model)
    {
        $this->data = new $model();
        return $this->data;
    }

    /**
     * @return array data passed to the view
     */
    protected function GetData(array $contents = [])
    {
        $data = $this->data->GetData();
        if (count($contents) > 0)
        {
            $data = array_merge($data, ['contents' => $contents]);
        }
        return $data;
    }

    /**
     *
     * @param  array  $views an array of views to be loaded
     * @return string the compiled view
     */
    protected function loadView($view, array $contents = [])
    {
        $data = $this->GetData($contents);   // data needed in the view
        ob_start();

        $view_file = VIEWS . DS . $view . '.php';
        include $view_file;

        $content = ob_get_contents();
        ob_end_clean();
        $this->content = $content;
    }

    /**
     * get's the buffer and returns it
     * @return string the buffer
     */
    public function out()
    {
        return $this->content;
    }

    public function GetRandomContent()
    {
        $content = array("main" . DS . "_randomcontents");
        $int = rand(0, 10);
        for($i = 0; $i < $int; $i++)
        {
            array_push($content, "main" . DS . "_randomcontents");
        }
        return $content;
    }

    protected function Session()
    {
        return $this->session;
    }
}