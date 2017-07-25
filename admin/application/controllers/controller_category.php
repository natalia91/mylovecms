<?php

class Controller_category extends Controller
{

    function __construct()
    {
        $this->model = Route::loader('categories','index',false);
        $this->view = new view();
    }

    function action_index()
    {

        if(Request::method() == "post" && Request::post('save')) {
            //если прислали форму, значит получаем новые данные
            $new_category = new stdClass();
            $id = Request::post('id','integer');
            $new_category->name = Request::post('name','string');
            $new_category->url = Request::translit($new_category->name);
            $new_category->parent_id = Request::post('parent_id','integer');
            $new_category->description = Request::post('description');
            $new_category->visible = Request::post('visible','boolean');

            if(!empty($id)) {
                //Update category
                $id = $this->model->updateCategory($id,$new_category);
                $message = 'update';
            } else {
                //Create category
                $this->model->addCategory($new_category);
                $id = $this->model->insert_id();
                $message = 'create';
            }

            $category = $this->model->getCategory($id);

        } else {
            if($id = Request::get('id','integer')) {
                $category = $this->model->getCategory($id);
            }
        }
$categories = $this->model->getCategories();
$data = array ();
$data['category'] = $category;
$data['categories'] = $categories;

        $this->view->generate('category_view.php', 'template_view.php',$data,'',$message);
    }
}