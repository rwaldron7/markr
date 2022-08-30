<?php

namespace App\Core;

class Controller
{
    protected function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) 
        {
            require_once '../app/models/' . $model . '.php';
            $model = 'App\Model\\'. $model;
            return new $model;
        }
        else return NULL;
    }

    protected function view($view, $data = [], $extra_data = [])
    {
        if (file_exists('../app/views/' . $view . '.php'))
        {
            require_once '../app/views/' . $view . '.php';
        }
        else
        {
            die('View does not exist');
        }
    }
}