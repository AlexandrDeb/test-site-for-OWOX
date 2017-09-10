<?php

class PagesController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Page();
    }

    public function index(){
        $this->data['pages'] = $this->model->getList();
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = strtolower($params[0]);
           $this->data['page'] = $this->model->getByAlias($alias);
        }
    }

 /*   public function pagesLogin(){
        if ( $_POST && isset($_POST['email']) && isset($_POST['password']) ){
            echo $_POST['email'];
            $obj = new User();
            $user = $obj->getByLogin($_POST['email']);
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
    }*/

}