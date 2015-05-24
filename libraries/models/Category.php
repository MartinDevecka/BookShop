<?php

class Category {
    
    /*
     * **************************************************************************************************************
     * CRUD model
     * **************************************************************************************************************
     */

    public static function categoryAdd($data) {

        extract($data);

        $category_add = "INSERT INTO categories "
                . "(category_name, category_image) "
                . "VALUES ('" . $category_name . "', '" . $category_image . "');";

        return DB::getInstance()->query($category_add);
    }
    
    public static function categorySelectAll() {

        $category_select_all = "SELECT "
                . "id_category, "
                . "category_name, "
                . "category_image "             
                . "FROM categories "
                . "ORDER BY id_category;";

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
    
    public static function categorySelect($id) {

        $category_select = "SELECT "
                . "id_category, "
                . "category_name, "
                . "category_image "
                . "FROM categories "
                . "WHERE id_category='" . $id . "';";              

        if ($result = DB::getInstance()->query($category_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

//    public static function categorySelect($data) {
//
//        extract($data);
//
//        $category_select = "SELECT "
//                . "id_category, "
//                . "category_name, "
//                . "category_image "
//                . "FROM categories "
//                . "WHERE category_name LIKE='%" . $category_name . "%' "
//                . "OR category_image LIKE='%" . $category_image . "%' "
//                . "ORDER BY id_category;";
//
//        if ($result = DB::getInstance()->query($category_select)) {
//            if ($result->num_rows > 0) {
//                return $result->fetch_all(MYSQLI_ASSOC);
//            } else {
//                return false;
//            }
//        } else {
//            return false;
//        }
//    }

    public static function categoryName($id) {

        $category_select = "SELECT "
                . "category_name "
                . "FROM categories "
                . "WHERE id_category='" . $id . "';";

        if ($result = DB::getInstance()->query($category_select)) {
            if ($result->num_rows > 0) {
                return ($result->fetch_row()[0]);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function categorySelectCombo() {

        $category_select = "SELECT "
                . "id_category, "
                . "category_name "
                . "FROM categories "
                . "ORDER BY id_category;";

        if ($result = DB::getInstance()->query($category_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function categoryEdit($data) {
        
        extract($data);

        $category_edit = "UPDATE categories "
                . "SET "
                . "category_name='" . $category_name . "', "
                . "category_image='" . $category_image . "' "
                . "WHERE id_category='" . $id_category . "';";

        return DB::getInstance()->query($category_edit);
    }

    public static function categoryDelete($id) {

        $category_delete = "DELETE FROM categories "
                . "WHERE id_category='" . $id . "';";

        return DB::getInstance()->query($category_delete);
    }
}
?>



