<?php

class BaseController
{
    public function model($model)
    {
        require_once '../app/model/'. $model . '.php';
        return new $model;
    }

    public function view($view , $data = [])
    {
        if(!file_exists('../app/view/' . $view . '.php'))
            die('The view is not exist');
        require_once '../app/view/'. $view . '.php';
    }
}