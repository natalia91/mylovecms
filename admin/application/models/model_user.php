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
}