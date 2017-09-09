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
        $this->route = Config::get('defaultRoute');
        $this->controller = Config::get('defaultController');
        $this->action = Config::get('defaultAction');

        $uriParts = explode('?', $this->uri);

        // Get path like controller/action/param1/param2/.../...
        $path = $uriParts[0];

        $pathParts = explode('/', $path);
        


        if ( count($pathParts) ){

            // Get controller - next element of array
            if ( current($pathParts) ){
                $this->controller = strtolower(current($pathParts));
                array_shift($pathParts);
            }
            // Get action
            if ( current($pathParts) ){
                $this->action = strtolower(current($pathParts));
                array_shift($pathParts);
            }

            // Get params - all the rest
            $this->params = $pathParts;

        }

    }


}