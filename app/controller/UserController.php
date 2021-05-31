<?php

class UserController extends BaseController
{

    public function index()
    {
        $data = [
            'text'=>'<h1>User View</h1>',
        ];

        $this->view('user/index', $data);
    }

}