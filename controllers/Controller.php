<?php 

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

namespace app\controllers;
use ho_b7\phpmvc\Application;
use ho_b7\phpmvc\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author houdaifa <boucena214@gmail.com>
 * @package app\controllers;
*/

class Controller 
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \ho_b7\phpmvc\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout) 
    {
        $this->layout = $layout;
    }
    
    public function render($view, $params = []) 
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware) 
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }

}