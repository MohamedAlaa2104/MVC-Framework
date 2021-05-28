<?php

class User
{
    public function __construct()
    {
        echo 'hello from user class';
    }

    public function index()
    {
        
    }

    public function create($param)
    {
        echo '<br>'. 'work good';
        echo $param; 
    }
}