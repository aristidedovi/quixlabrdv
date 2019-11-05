<?php
namespace Core\Controller;

class Controller{

    protected $viewPath;
    protected  $template;

    /**
     * @param $view
     * @param array $variables
     */
    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.','/',$view).'.php');
        $content = ob_get_clean();

        require($this->viewPath.'templates/'.$this->template.'.php');
    }

    /**
     *
     */
    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    /**
     *
     */
    protected function notFound(){

        //header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        require($this->viewPath.'templates/404.php');
    }
}