<?php

class Controller_admin extends Controller
{

    function __construct()
    {
        //$this->model = new Model_products();
        $this->view = new view();
    }

    function action_index()
    {

        /* $portfolio = Route::loader('portfolio','index');*/

        $this->view->generate('admin_view.php', 'template_view.php');
    }
}