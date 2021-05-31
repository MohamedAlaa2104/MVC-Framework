<?php

class HomeController extends BaseController
{
    public function index ()
    {
        $data = [];
        $this->view('home/index', $data);
    }
}