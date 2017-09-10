<?php

class UsersController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function login(){
        if ( $_POST && isset($_POST['email']) && isset($_POST['password']) ){

            $user = $this->model->getByLogin($_POST['email']);
            $hash = md5(Config::get('salt').$_POST['password']);
            if ( $user && $hash == $user['password'] ){
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/');
        }
    }

    public function logout(){
        Session::destroy();
        Router::redirect('/');
    }
    
}