<?php

class User extends BaseController
{

    public function index()
    {
        $data = [
            'text'=>'<h1>User View Text by passing data from controller to view</h1>',
        ];
        $this->view('user', $data);
    }

}