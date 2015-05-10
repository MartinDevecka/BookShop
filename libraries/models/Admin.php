<?php

class Admin {
    /*
     * *************************************************************************************************************
     * Category add, select, edit, delete (CRUD)
     * *************************************************************************************************************
     */

    public static function categoryAdd($data) {

        extract($data);

        $category_add = "INSERT INTO categories "
                . "(category_name, category_image) "
                . "VALUES ('" . $category_name . "', '" . $category_image . "');";

        return DB::getInstance()->query($category_add);
    }

    public static function categorySelect($data) {

        extract($data);

        $category_select = "SELECT "
                . "id_category, "
                . "category_name, "
                . "category_image "
                . "FROM categories "
                . "WHERE category_name LIKE='%" . $category_name . "%' "
                . "OR category_image LIKE='%" . $category_image . "%' "
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

    public static function categoryEdit($id) {

        $category_edit = "UPDATE categories "
                . "SET "
                . "category_name='" . $category_name . "', "
                . "category_image='" . $category_image . "' "
                . "WHERE id_category='" . $id . "';";

        return DB::getInstance()->query($category_edit);
    }

    public static function categoryDelete($id) {

        $category_delete = "DELETE FROM categories "
                . "WHERE id_category='" . $id . "';";

        return DB::getInstance()->query($category_delete);
    }

    /*
     * *************************************************************************************************************
     * Author add, select, edit, delete (CRUD)
     * *************************************************************************************************************
     */

    public static function authorAdd($data) {

        extract($data);

        $author_add = "INSERT INTO authors "
                . "(author_name) "
                . "VALUES ('" . $author_name . "');";

        return DB::getInstance()->query($author_add);
    }

    public static function authorSelect($data) {

        extract($data);

        $author_select = "SELECT "
                . "id_author, "
                . "author_name "
                . "FROM authors "
                . "WHERE author_name LIKE='%" . $author_name . "%' "
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

    public static function authorEdit($id) {

        $author_edit = "UPDATE authors "
                . "SET "
                . "author_name='" . $author_name . "' "
                . "WHERE id_author='" . $id . "';";

        return DB::getInstance()->query($author_edit);
    }

    public static function authorDelete($id) {

        $author_delete = "DELETE FROM authors "
                . "WHERE id_author='" . $id . "';";

        return DB::getInstance()->query($author_delete);
    }

    /*
     * *************************************************************************************************************
     * Book add, select, edit, delete (CRUD)
     * *************************************************************************************************************
     */

    public static function bookAdd($data) {

        extract($data);

        $book_add = "INSERT INTO books "
                . "(id_author, id_category, book_title, book_subject, book_image, book_ISBN, book_price, book_discount, book_path) "
                . "VALUES ('" . $author . "', '" . $category . "', '" . $title . "', '" . $subject . "', '" . $image . "', '" . $isbn . "', '" . $price . "', '" . $discount . "', '" . $path . "');";

        return DB::getInstance()->query($book_add);
    }

    public static function bookSelectAll() {

        $book_select = "SELECT "
                . "id_book, "
                . "id_author, "
                . "id_category, "
                . "book_title, "
                . "book_subject, "
                . "book_image, "
                . "book_ISBN, "
                . "book_price, "
                . "book_discount, "
                . "book_path "
                . "FROM books "
                . "ORDER BY id_book;";

        if ($result = DB::getInstance()->query($book_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function bookSelect($id) {

        $book_select = "SELECT "
                . "id_book, "
                . "id_author, "
                . "id_category, "
                . "book_title, "
                . "book_subject, "
                . "book_image, "
                . "book_ISBN, "
                . "book_price, "
                . "book_discount, "
                . "book_path "
                . "FROM books "
                . "WHERE id_book='" . $id . "';";

        if ($result = DB::getInstance()->query($book_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function bookSelectCombo() {

        $book_select = "SELECT "
                . "id_book, "
                . "book_title "
                . "FROM books "
                . "ORDER BY id_book;";

        if ($result = DB::getInstance()->query($book_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function bookEdit($id) {

        $book_edit = "UPDATE books "
                . "SET "
                . "id_author='" . $id_author . "', "
                . "id_category='" . $id_category . "', "
                . "book_title='" . $book_title . "', "
                . "book_subject='" . $book_subject . "', "
                . "book_image='" . $book_image . "', "
                . "book_ISBN='" . $book_ISBN . "', "
                . "book_price='" . $book_price . "', "
                . "book_discount='" . $book_discount . "', "
                . "book_path='" . $book_path . "' "
                . "WHERE id_book='" . $id . "';";

        return DB::getInstance()->query($book_edit);
    }

    public static function bookDelete($id) {

        $book_delete = "DELETE FROM books "
                . "WHERE id_book='" . $id . "';";

        return DB::getInstance()->query($book_delete);
    }
}
?>

