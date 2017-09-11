<?php

class UsersController extends Controller
{
    private $facebookId;
    private $login;
    private $email;
    private $password;
    private $avatar;

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
        if ($_GET) {

            $token = json_decode(file_get_contents('https://graph.facebook.com/v2.9/oauth/access_token?client_id=' . Config::get('id') . '&redirect_uri=' . Config::get('url') . '&client_secret=' . Config::get('secret') . '&code=' . $_GET['code']), true);
            $data = json_decode(file_get_contents('https://graph.facebook.com/v2.9/me?client_id=' . Config::get('id') . '&redirect_uri=' . Config::get('url') . '&client_secret=' . Config::get('secret') . '&code=' . $_GET['code'] . '&access_token=' . $token['access_token'] . '&fields=id,name,email'), true);

            if (isset($data['email'])) {
                $this->email = $data['email'];
            } else {
                $rend = uniqid();
                $this->email = $rend.'@gmail.com';
            }

            $this->login = $data['name'];
            $this->facebookId = $data['id'];
            $this->password = uniqid();
            $this->avatar = $data['avatar'] = 'https://graph.facebook.com/v2.9/' . $data['id'] . '/picture?width=100&height=100';

            $hash = md5(Config::get('salt') . $this->password);
            $checUser = $this->model->chekUnicFacebookId($this->facebookId);

            if (!$checUser){
                Session::set('avatar', $this->avatar);
                Session::set('passwordFb', 'Пароль: '.$this->password);
                Session::set('emailFb', 'Почта: '.$this->email);
                $this->model->regUser($this->login, $this->email, $hash, $this->avatar, $this->facebookId);
            }
            if ($this->avatar){
                Session::set('avatar', $this->avatar);
            }else{
                Session::set('avatar', $checUser['image']);
            }
            
            Session::set('login', $this->login);
            Session::set('role', '1');
            Router::redirect('/');



        } elseif (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
            $this->login = $_POST['login'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $hash = md5(Config::get('salt') . $this->password);
            $email = $this->model->checkEmailAndImage($_POST['email']);
            //var_dump($email['email']);
            //var_dump($this->email);
            if (!$_POST['login']) {
                Session::setFlash('Поле: "Имя" не должно быть пустым');
            } elseif (!$_POST['email']) {
                Session::setFlash('Поле: "Email" не должно быть пустым');
            } elseif (!$_POST['password']) {
                Session::setFlash('Поле: "Пароль" не должно быть пустым');
            } elseif ($email['email'] == $this->email) {
                Session::setFlash('Пользователь с email: " ' . $this->email . '" уже существует');

            } else {
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
            $image = $this->model->checkEmailAndImage($this->email);

            if ($image['image']){
                Session::set('avatar', $image['image']);
            }
            $hash = md5(Config::get('salt') . $this->password);
            if ($user && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
                Router::redirect('/');
            } else {
                Session::setFlash('Неправильный пароль или email');
            }

        }
    }


    public function logout()
    {
        Session::destroy();
        Router::redirect('/');
    }

}