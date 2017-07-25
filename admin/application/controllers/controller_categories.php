<?php

class Controller_categories extends Controller
{

    function __construct()
    {
        $this->model = new Model_categories();
        $this->view = new view();
    }

    function action_index()
    {


        $categories = $this->model->getCategories();
        $data['categories'] = $categories;

        $this->view->generate('categories_view.php', 'template_view.php', $data);
    }
}