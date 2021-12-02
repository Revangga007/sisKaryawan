<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function login_action()
    {

    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
