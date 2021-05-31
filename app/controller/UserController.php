<?php

class UserController extends BaseController
{

    public function index()
    {
        $this->userModel = $this->model('User');
        $data = [
            'text'=>'<h1>User View Text by passing data from controller to view</h1>',
            'users'=> $this->userModel->getUsers(),
        ];



        $this->view('user/index', $data);
    }

}