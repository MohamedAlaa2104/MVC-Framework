<?php

class User extends BaseController
{
    public function __construct()
    {
        $this->view('user');        
    }

    public function index()
    {
        echo 'User / Index';
    }

}