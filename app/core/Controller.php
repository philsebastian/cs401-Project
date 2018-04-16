<?php
session_start();

class Controller
{
    protected $name;
    protected $data;

    public function __construct($name)
    {
        Logger::LogTrace("Controller.__construct", "Contructing controller: {$name}");
        $this->name = $name;
    }

    protected function model($model)
    {
        Logger::LogTrace("Controller.model", "Making model: {$model}");
        $this->data = new $model();
        return $this->data;
    }

    /**
     * @return array data passed to the view
     */
    protected function GetData($content)
    {
        $data = $this->data->GetData($content);
        Logger::LogTrace("Controller.GetData", "Getting data. Contents size " . count($data));

        $data = self::EscapeHTMLEntities($data);

        return $data;
    }

    /**
     *
     * @param  array  $views an array of views to be loaded
     * @return string the compiled view
     */
    protected function loadView($view, $content = [])
    {
        Logger::LogTrace("Controller.loadView", "Loading {$view}");
        $data = $this->GetData($content);   // data needed in the view
        ob_start();

        $view_file = VIEWS . DS . $view . '.php';
        include $view_file;

        $content = ob_get_contents();
        ob_end_clean();
        Logger::LogDebug("Controller.loadView", "Content of view: {$content}");
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

    private function EscapeHTMLEntities($data)
    {
        if (is_array($data))
        {
            foreach ($data as $index => $value)
            {
                $data[$index] = self::EscapeHTMLEntities($value);
            }
            return $data;
        } 
        else
        {
            return htmlspecialchars($data);
        }
    }
}