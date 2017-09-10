<?php

class UsersController extends Controller
{
    private $login;
    private $email;
    private $password;

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function validate()
    {
        if (!$_POST['login']) {
            Session::setFlash('login не может быть пустым');
        } elseif (!$_POST['email']) {
            Session::setFlash('email не может быть пустым');
        } elseif (!$_POST['password']) {
            Session::setFlash('password не может быть пустым');
        }

    }

    public function register()
    {
        if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
           $this->login = $_POST['login'];
           $this->email = $_POST['email'];
           $this->password = $_POST['password'];
            $hash = md5(Config::get('salt') . $this->password);
            $unic = $this->model->checUnicEmail($this->email);
            if (!$_POST['login']) {
                Session::setFlash('login не может быть пустым');
            } elseif (!$_POST['email']) {
                Session::setFlash('email не может быть пустым');
            } elseif (!$_POST['password']) {
                Session::setFlash('password не может быть пустым');
            }elseif($unic){
                Session::setFlash('Такой email уже существует');

            }else{
                $this->model->regUser($this->login, $this->email, $hash);
                Session::set('login', $this->login);
                Session::set('role', 1);
                Router::redirect('/');
            }


        }
    }

    public function login()
    {
        if ($_POST && isset($_POST['email']) && isset($_POST['password'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $user = $this->model->getByLogin($this->email);
            $hash = md5(Config::get('salt') . $this->password);
            if ($user && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
                Router::redirect('/');
            } else {
                Session::setFlash('Не правильный пароль или email');
            }

        }
    }


    public function logout()
    {
        Session::destroy();
        Router::redirect('/');
    }

}