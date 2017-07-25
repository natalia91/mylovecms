<?php

class Model_pages extends Model
{
    public function getPage($id) {
        if(empty($id)) {
            return false;
        }
        $q = "SELECT id, name, url, description, visible FROM pages WHERE id = $id";
        $res = $this->query($q);
        return $res;
    }

    public function addPage($page) {
        if(empty($page)) {
            return false;
        }

        $q = "INSERT INTO pages (`name`,`url`,`description`,`visible`)
                        VALUES ('$page->name',
                                '$page->url',
                                '$page->description',
                                '$page->visible')";

        $this->query($q);
    }

    public function updatePage($id, $page) {
        if(empty($id) || empty($page)) {
            return false;
        }

        $q = "UPDATE pages SET name = '$page->name',
                                    url = '$page->url',
                                    description = '$page->description',
                                    visible = '$page->visible'
                WHERE id = '$id'";

        if($this->query($q)) {
            return $id;
        } else {
            return false;
        }
    }

    public function getPages() {
        $q = "SELECT id, name, url, description, visible FROM pages";
        $res = $this->query($q);
        if (count ($res) == 1){
            $data[] = $res;
        } else {
            $data = $res;
        }
        return $data;
    }
}