<?php

class Book {

    // Book search by title, subject, ISBN and author in all categories.
    public static function bookSearch($data) {

        extract($data);

        $search_book = "SELECT "
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
                . "WHERE a.book_title LIKE '%" . $book_search . "%' "
                . "OR a.book_subject LIKE '%" . $book_search . "%' "
                . "OR a.book_ISBN LIKE '%" . $book_search . "%' "
                . "OR b.author_name LIKE '%" . $book_search . "%' "
                . "GROUP BY a.id_book "
                . "ORDER BY a.book_title";

        if ($result = DB::getInstance()->query($search_book)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>
