<?php

class Model_categories extends Model
{
    public function getCategory($id) {
        if(empty($id)) {
            return false;
        }
        $q = "SELECT id, name, url, description, visible, parent_id FROM categories WHERE id = $id";
        $res = $this->query($q);
        return $res;
    }

    public function addCategory($category) {
        if(empty($category)) {
            return false;
        }

        $q = "INSERT INTO categories (`name`,`url`,`description`,`visible`,`parent_id`)
                        VALUES ('$category->name',
                                '$category->url',
                                '$category->description',
                                '$category->visible',
                                '$category->parent_id')";

        $this->query($q);
    }

    public function updateCategory($id, $category) {
        if(empty($id) || empty($category)) {
            return false;
        }

        $q = "UPDATE categories SET name = '$category->name',
                                    url = '$category->url',
                                    description = '$category->description',
                                    visible = '$category->visible',
                                    parent_id = '$category->parent_id'
                WHERE id = '$id'";

        if($this->query($q)) {
            return $id;
        } else {
            return false;
        }
    }

    public function getCategories() {
        $q = "SELECT id, name, url, description, visible, parent_id, created FROM categories";
        $res = $this->query($q);
        if (count ($res) == 1){
            $data[] = $res;
        } else {
            $data = $res;
        }
        return $data;
    }
}