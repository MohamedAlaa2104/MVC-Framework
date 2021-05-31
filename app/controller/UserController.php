<?php

class UserController extends BaseController
{

    public function index()
    {
        $data = [
            'text'=>'<h1>User View Text by passing data from controller to view</h1>',
        ];

        $this->userModel = $this->model('User');


        $this->view('user/index', $data);
    }

}