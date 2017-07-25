<?php

class Controller_products extends Controller
{

    function __construct()
    {
        $this->model = new Model_products();
        $this->view = new view();
    }

    function action_index()
    {


        $products = $this->model->getProducts();
        $data['products'] = $products;

        $this->view->generate('products_view.php', 'template_view.php', $data);
    }
}