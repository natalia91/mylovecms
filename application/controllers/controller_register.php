<?php

class Controller_register extends Controller
{

    function __construct()
    {
        $this->model = Route::loader('register','index',false);
        $this->view = new view();
    }

    function action_index()
    {
        $user->name = $name;
         $user->phone = $phone;
         $user->email = $email;
         $user->password = $password;

        if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST))
        {
           $name = trim($_POST['name']);
           $email = trim($_POST['email']);
           $phone = trim($_POST['phone']);
           $password = trim($_POST['password']);
        }

        if(!empty($name) && !empty($email) && !empty($phone) && !empty($password))
        {
             $user = new stdClass();
             this->model->addUser($user);
        }

        $user = $this->model->addUser();
        $data['user'] = $user;

        $this->view->generate('register_view.php', 'template_view.php', $data);
    }


}