<?php

class Controller_pages extends Controller
{

    function __construct()
    {
        $this->model = new Model_pages();
        $this->view = new view();
    }

    function action_index()
    {


        $pages = $this->model->getPages();
        $data['pages'] = $pages;

        $this->view->generate('pages_view.php', 'template_view.php',$data);
    }
}