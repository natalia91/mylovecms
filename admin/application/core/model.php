<?php

class Model
{

    /*
        Модель обычно включает методы выборки данных, это могут быть:
            > методы нативных библиотек pgsql или mysql;
            > методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
            > методы ORM;
            > методы для работы с NoSQL;
            > и др.
    */

    private $mysqli;
    private $results;
    private $data;


    function __construct()
    {

        if(!empty($this->mysqli)) {
            return $this->mysqli;
        }


        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if($this->mysqli->connect_error)
        {
            trigger_error("Could not connect to the database: ".$this->mysqli->connect_error, E_USER_WARNING);
            return false;
        }
    }

    function __destruct()
    {
        if($this->mysqli) {
            $this->mysqli->close();
        }
    }

    public  function escape($query) {
        if(!empty($query)) {
            return $this->mysqli->real_escape_string($query);
        }
    }

    public function query($query)
    {
        if(empty($query))
        {
            return false;
        }

        $this->results = $this->mysqli->query($query);
        $this->data = array();
        if(is_object($this->results)) {
            while ($row = $this->results->fetch_object()) {
                $this->data[] = $row;
            }
            if(count($this->data) == 1) {
                return reset($this->data);
            } else {
                return $this->data;
            }
        } else {
            return $this->results;
        }
    }

    public function insert_id() {
        return $this->mysqli->insert_id;
    }
}