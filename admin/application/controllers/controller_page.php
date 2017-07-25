<?php

class Controller_page extends Controller
{

    function __construct()
    {
        $this->model = Route::loader('pages','index',false);
        $this->view = new view();
    }

    function action_index()
    {

        if(Request::method() == "post" && Request::post('save')) {
            //если прислали форму, значит получаем новые данные
            $new_page = new stdClass();
            $id = Request::post('id','integer');
            $new_page->name = Request::post('name','string');
            $new_page->url = Request::translit($new_page->name);
            $new_page->description = Request::post('description');
            $new_page->visible = Request::post('visible','boolean');

            if(!empty($id)) {
                //Update page
                $id = $this->model->updatePage($id,$new_page);
                $message = 'update';
            } else {
                //Create page
                $this->model->addPage($new_page);
                $id = $this->model->insert_id();
                $message = 'create';
            }

            $page = $this->model->getPage($id);

        } else {
            if($id = Request::get('id','integer')) {
                $page = $this->model->getPage($id);
            }
        }
$pages = $this->model->getPages();
$data = array ();
$data['page'] = $page;
$data['pages'] = $pages;

        $this->view->generate('page_view.php', 'template_view.php',$data,'',$message);
    }
}