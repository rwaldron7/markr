<?php

namespace App\Core;

class App
{
    // Set default values.
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    
    // Constructor when class is called.
    public function __construct()
    {
        // Run the parseUrl method.   
        $url = $this->parseUrl();

        // If there is a value in position 0 of array, this is the controller to call.
        if(isset($url[0]))
        {
            // Check to see if file exists in app/controllers folder.
            if(file_exists('../app/controllers/' . $url[0] . '.php'))
            {
                // Set controller to this value.
                $this->controller = $url[0];
                // Remove controller from array.
                unset($url[0]);
            }
        }
        
        // Require the controller file (default is home if controller wasn't changed).
        require_once '../app/controllers/' . $this->controller . '.php';

        // Changes the controller to an object of that controller class.
        $controller = 'App\Controller\\' . $this->controller; 
        $this->controller = new $controller;
        
        // If there is a method set, set the method variable to the name of the method, and remove from array.
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // If the array have any values left, move them to a new array.
        $this->params = $url ? array_values($url) : [];

        // Call the method on the controller, with the array of parameters as inputs.
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // If URL exists, convert to array by splitting where a '/' appears.
    public function parseUrl()
    {
        if(isset($_GET['url'])) 
        {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            return $url;
        }
    }
}