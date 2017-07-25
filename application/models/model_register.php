<?php

class Model_user extends Model
{
    public function getUser($id)
    {
        if(empty($id)) {
            return false;
        }

        $query  = "SELECT * FROM users WHERE id = ". $id;


        $res = $this->query($this->escape($query));

        if(!empty($res)) {
            return $res;
        }
    }

    public function addUser($data)
    {
        if(empty($data))
        {
            return falce;
        }

        $query = "INSERT INTO users (`name`, `email`, `phone`, `password`) VALUES ('$data->name', '$data->email', '$data->phone', '$data->password')";
        $result = this->query($query);
        if(!$result)
        {
            return $result;
        }
    }
}