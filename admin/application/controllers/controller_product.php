<?php

class Controller_product extends Controller
{

    function __construct()
    {
        $this->model = Route::loader('products','index',false);
        $this->view = new view();
    }

    function action_index()
    {

        if(Request::method() == "post" && Request::post('save')) {
            //если прислали форму, значит получаем новые данные
            $new_product = new stdClass();
            $id = Request::post('id','integer');
            $new_product->name = Request::post('name','string');
            $new_product->url = Request::translit($new_product->name);
            $new_product->amount = Request::post('amount','integer');
            $new_product->price = Request::post('price','float');
            $new_product->description = Request::post('description');
            $new_product->visible = Request::post('visible','boolean');

            if(!empty($id)) {
                //Update product
                $id = $this->model->updateProduct($id,$new_product);
                $message = 'update';
            } else {
                //Create product
                $this->model->addProduct($new_product);
                $id = $this->model->insert_id();
                $message = 'create';
            }

            $product = $this->model->getProduct($id);

        } else {
            //если нет запроса, то выбирает товар по его id
            if($id = Request::get('id','integer')) {
                $product = $this->model->getProduct($id);
            }
        }

$products = $this->model->getProducts();
$data = array ();
$data['product'] = $product;
$data['products'] = $products;

        $this->view->generate('product_view.php', 'template_view.php',$data,'',$message);
    }
}