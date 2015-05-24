<?php

class Author {
    
    /*
     * **************************************************************************************************************
     * CRUD model 
     * **************************************************************************************************************
     */

    public static function authorAdd($data) {

        extract($data);

        $author_add = "INSERT INTO authors "
                . "(author_name) "
                . "VALUES ('" . $author_name . "');";

        return DB::getInstance()->query($author_add);
    }
    
     public static function authorSelectAll() {

        $category_select_all = "SELECT "
                . "id_author, "
                . "author_name "                        
                . "FROM authors "
                . "ORDER BY id_author;";

        if ($result = DB::getInstance()->query($category_select_all)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function authorSelect($id) {     

        $author_select = "SELECT "
                . "id_author, "
                . "author_name "
                . "FROM authors "
                . "WHERE id_author='" . $id . "';"; 
        
        if ($result = DB::getInstance()->query($author_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function authorName($id) {

        $author_select = "SELECT "
                . "author_name "
                . "FROM authors "
                . "WHERE id_author='" . $id . "';";

        if ($result = DB::getInstance()->query($author_select)) {
            if ($result->num_rows > 0) {
                return ($result->fetch_row()[0]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function authorSelectCombo() {

        $author_select = "SELECT "
                . "id_author, "
                . "author_name "
                . "FROM authors "
                . "ORDER BY id_author;";

        if ($result = DB::getInstance()->query($author_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function authorEdit($data) {
        
        extract($data);

        $author_edit = "UPDATE authors "
                . "SET "
                . "author_name='" . $author_name . "' "
                . "WHERE id_author='" . $id_author . "';";

        return DB::getInstance()->query($author_edit);
    }

    public static function authorDelete($id) {

        $author_delete = "DELETE FROM authors "
                . "WHERE id_author='" . $id . "';";

        return DB::getInstance()->query($author_delete);
    }
}

?>
