<?php

class Controller
{
    protected $name;
    protected $data;
    private $content;

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
    protected function GetData()
    {
        return $this->data->GetData();
    }

    /**
     *
     * @param  array  $views an array of views to be loaded
     * @return string the compiled view
     */
    protected function loadFullView(array $views)
    {
        $data = $this->getData();   // data needed in the view
        $this->loadView($views, $data);
    }

    /**
     *
     * @param  array  $views an array of views to be loaded
     * @return string the compiled view
     */
    private function loadView(array $views, array $data = [])
    {
        ob_start();
        foreach ($views as $k => $view) {
            $view_file = VIEWS . DS . $view . '.php';
            include $view_file;
        }
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
}