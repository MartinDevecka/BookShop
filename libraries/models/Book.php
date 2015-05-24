<?php

class Book {
    
    /*
     * **************************************************************************************************************
     * Book search by title, subject, ISBN and author in all categories.
     * **************************************************************************************************************
     */

    public static function bookSearch($data = NULL) {
        $search_book = "SELECT "
                . "c.category_name, "
                . "a.book_title, "
                . "a.id_book, "
                . "b.author_name, "
                . "a.book_image, "
                . "a.book_subject, "
                . "a.book_ISBN, "
                . "a.book_price, "
                . "a.book_discount "
                . "FROM books a "
                . "JOIN authors b ON a.id_author=b.id_author "
                . "JOIN categories c ON a.id_category=c.id_category ";

        if ($data != NULL) {
            extract($data);
            $search_book .= "WHERE a.book_title LIKE '%" . $book_search . "%' "
                    . "OR a.book_subject LIKE '%" . $book_search . "%' "
                    . "OR a.book_ISBN LIKE '%" . $book_search . "%' "
                    . "OR b.author_name LIKE '%" . $book_search . "%' "
                    . "OR c.category_name LIKE '%" . $book_search . "%' ";
        }

        $search_book .= "GROUP BY a.id_book "
                . "ORDER BY a.book_title;";

        if ($result = DB::getInstance()->query($search_book)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        } else {
            return false;
        }
    }

    // Find book by id
    public static function bookDetail($id) {

        $detail_book = "SELECT "
                . "c.category_name, "
                . "a.book_title, "
                . "a.id_book, "
                . "b.author_name, "
                . "a.book_image, "
                . "a.book_subject, "
                . "a.book_ISBN, "
                . "a.book_price, "
                . "a.book_discount "
                . "FROM books a "
                . "JOIN authors b ON a.id_author=b.id_author "
                . "JOIN categories c ON a.id_category=c.id_category "
                . "WHERE a.id_book='" . $id . "';";

        if ($result = DB::getInstance()->query($detail_book)) {
            if ($result->num_rows > 0) {
                return $result->fetch_array(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }            
    }
    
    public static function bookAddReview($data) {

        extract($data);

        $review_add = "INSERT INTO books_reviews "
                . "(id_book, id_user, book_review, book_review_rate) "
                . "VALUES ('" . $id_book . "', '" . $id_user . "', '" . $book_review . "', '" . $book_review_rate . "');";

        return DB::getInstance()->query($review_add);
    }

    /*
     * **************************************************************************************************************
     * CRUD model 
     * **************************************************************************************************************
     */

    public static function bookAdd($data) {

        extract($data);

        $book_add = "INSERT INTO books "
                . "(id_author, id_category, book_title, book_subject, book_image, book_ISBN, book_price, book_discount, book_file) "
                . "VALUES ('" . $id_author . "', '" . $id_category . "', '" . $title . "', '" . $subject . "', '" . $image . "', '" . $isbn . "', '" . $price . "', '" . $discount . "', '" . $file . "');";

        return DB::getInstance()->query($book_add);
    }

    public static function bookSelectAll() {

        $book_select_all = "SELECT "
                . "id_book, "
                . "id_author, "
                . "id_category, "
                . "book_title, "
                . "book_subject, "
                . "book_image, "
                . "book_ISBN, "
                . "book_price, "
                . "book_discount, "
                . "book_file "
                . "FROM books "
                . "ORDER BY id_book;";

        if ($result = DB::getInstance()->query($book_select_all)) {
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
                . "book_file "
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
    
    public static function bookTitle($id) {

        $book_select = "SELECT "
                . "book_title "
                . "FROM books "
                . "WHERE id_book='" . $id . "';";

        if ($result = DB::getInstance()->query($book_select)) {
            if ($result->num_rows > 0) {
                return ($result->fetch_row()[0]);
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

    public static function bookEdit($data) {

        extract($data);

        $book_edit = "UPDATE books "
                . "SET "
                . "id_author=" . $id_author . ", "
                . "id_category=" . $id_category . ", "
                . "book_title='" . $book_title . "', "
                . "book_subject='" . $book_subject . "', "
                . "book_image='" . $book_image . "', "
                . "book_ISBN='" . $book_ISBN . "', "
                . "book_price='" . $book_price . "', "
                . "book_discount='" . $book_discount . "', "
                . "book_file='" . $book_file . "' "
                . "WHERE id_book=" . $id_book . ";";

        return DB::getInstance()->query($book_edit);
    }

    public static function bookDelete($id) {

        $book_delete = "DELETE FROM books "
                . "WHERE id_book='" . $id . "';";

        return DB::getInstance()->query($book_delete);
    }
}

?>
