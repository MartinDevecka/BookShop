<?php

class Book {

    // Book search by title, subject, ISBN and author in all categories.
    public static function bookSearch($data) {

        extract($data);

        $search_book_title = "SELECT "
                . "c.category_name, "
                . "a.book_title, "
                . "b.author_name, "
                . "a.book_image, "
                . "a.book_subject, "
                . "a.book_ISBN, "
                . "a.book_price, "
                . "a.book_discount "
                . "FROM books a "
                . "JOIN authors b ON a.id_author=b.id_author "
                . "JOIN categories c ON a.id_category=c.id_category "
                . "WHERE a.book_title='" . $book_search . "'";

        if ($result_title = DB::getInstance()->query($search_book_title)) {
            if ($result_title->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        $search_book_subject = "SELECT "
                . "c.category_name, "
                . "a.book_title, "
                . "b.author_name, "
                . "a.book_image, "
                . "a.book_subject, "
                . "a.book_ISBN, "
                . "a.book_price, "
                . "a.book_discount "
                . "FROM books a "
                . "JOIN authors b ON a.id_author=b.id_author "
                . "JOIN categories c ON a.id_category=c.id_category "
                . "WHERE a.book_subject='" . $book_search . "'";

        if ($result_subject = DB::getInstance()->query($search_book_subject)) {
            if ($result_subject->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        $search_book_ISBN = "SELECT "
                . "c.category_name, "
                . "a.book_title, "
                . "b.author_name, "
                . "a.book_image, "
                . "a.book_subject, "
                . "a.book_ISBN, "
                . "a.book_price, "
                . "a.book_discount "
                . "FROM books a "
                . "JOIN authors b ON a.id_author=b.id_author "
                . "JOIN categories c ON a.id_category=c.id_category "
                . "WHERE a.book_ISBN='" . $book_search . "'";

        if ($result_ISBN = DB::getInstance()->query($search_book_ISBN)) {
            if ($result_ISBN->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        $search_book_author = "SELECT "
                . "c.category_name, "
                . "a.book_title, "
                . "b.author_name, "
                . "a.book_image, "
                . "a.book_subject, "
                . "a.book_ISBN, "
                . "a.book_price, "
                . "a.book_discount "
                . "FROM books a "
                . "JOIN authors b ON a.id_author=b.id_author "
                . "JOIN categories c ON a.id_category=c.id_category "
                . "WHERE b.author_name='" . $book_search . "'";

        if ($result_author = DB::getInstance()->query($search_book_author)) {
            if ($result_author->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>
