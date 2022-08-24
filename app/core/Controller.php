<?php

namespace App\Core;

class Controller
{
    protected function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        $model = 'App\Model\\'. $model;
        return new $model;
    }

    protected function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}