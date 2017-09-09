<?php

class Router
{

    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;



    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed|null
     */
    public function getRoute()
    {
        return $this->route;
    }

    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));

        // Get defaults
        $routes = Config::get('routes');
        $this->route = Config::get('defaultRoute');
        $this->controller = Config::get('defaultController');
        $this->action = Config::get('defaultAction');

        $uri_parts = explode('?', $this->uri);

        // Get path like controller/action/param1/param2/.../...
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);
        


        if ( count($path_parts) ){

            // Get controller - next element of array
            if ( current($path_parts) ){
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Get action
            if ( current($path_parts) ){
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get params - all the rest
            $this->params = $path_parts;

        }

    }


}