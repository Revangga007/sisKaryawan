<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    
    public function login()
    {
        if(session('id') && session('nama') && session('username') && session('role')){
            return redirect()->to(base_url('/'));
        }
        session();
        return view('auth/login');
    }

    public function login_action()
    {
       $auth = $this->request->getPost();
       $model = new UserModel();
       $user = $model->where(['username' => $auth['username']])->first();
       if($user){
            if(password_verify($auth['password'], $user['password'])){
                $session_data['id'] = $user['id'];
                $session_data['nama'] = $user['nama'];
                $session_data['username'] = $user['username'];
                $session_data['role'] = $user['role'];
                session()->set($session_data);
                return redirect()->to(base_url('/'));
            } else {
                return redirect()->to(base_url('login'))->withInput()->with('danger', 'Password tidak sesuai!');
            }
       } else {
           return redirect()->to(base_url('login'))->withInput()->with('danger', 'Username tidak ditemukan!');
       }
    }

    public function logout(){
        session()->remove('id');
        session()->remove('nama');
        session()->remove('username');
        session()->remove('role');
        return redirect()->to(base_url('login'));
    }
}