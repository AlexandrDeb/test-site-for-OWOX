<?php

class PrivatsController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Privat();
    }

    public function index()
    {
        $this->data['posts'] = $this->model->getPost();
    }

    public function view()
    {
       
    }

}