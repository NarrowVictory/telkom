<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/v_login');
    }

    public function contact()
    {
        return view('home/v_contact');
    }

    public function login()
    {
        return view('home/v_login');
    }
}
