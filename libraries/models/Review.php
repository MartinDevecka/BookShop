<?php

class Review {    

    /*
     * **************************************************************************************************************
     * CRUD model 
     * **************************************************************************************************************
     */

    public static function reviewAdd($data) {

        extract($data);

        $review_add = "INSERT INTO books_reviews "
                . "(id_book, id_user, book_review, book_review_rate) "
                . "VALUES ('" . $id_book . "', '" . $id_user . "', '" . $book_review . "', '" . $book_review_rate . "');";

        return DB::getInstance()->query($review_add);
    }

    public static function reviewSelectAll() {

        $review_select_all = "SELECT "
                . "id_books_reviews, "
                . "id_book, "
                . "id_user, "
                . "book_review, "
                . "book_review_date, "
                . "book_review_rate "                        
                . "FROM books_reviews "
                . "ORDER BY id_books_reviews;";

        if ($result = DB::getInstance()->query($review_select_all)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function reviewSelect($id) {

        $review_select = "SELECT "
                . "id_books_reviews, "
                . "id_book, "
                . "id_user, "
                . "book_review, "
                . "book_review_date, "
                . "book_review_rate "            
                . "FROM books_reviews "
                . "WHERE id_books_reviews='" . $id . "';";

        if ($result = DB::getInstance()->query($review_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function SelectBookReviews($id_book) {

        $review_select = "SELECT "
                . "id_user, "
                . "book_review, "
                . "book_review_date, "
                . "book_review_rate "            
                . "FROM books_reviews "
                . "WHERE id_book='" . $id_book . "';";

        if ($result = DB::getInstance()->query($review_select)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function reviewEdit($data) {

        extract($data);

        //UPDATE onlinelibrary.books_reviews SET id_book='2', id_user='2', book_review='perfect', book_review_date='2015-05-23', book_review_rate='2' WHERE id_books_reviews='6';
        $review_edit = "UPDATE books_reviews "
                . "SET "
                . "id_book='" . $id_book . "', "
                . "id_user='" . $id_user . "', "
                . "book_review='" . $book_review . "', "
                . "book_review_date='" . $book_review_date . "', "
                . "book_review_rate='" . $book_review_rate . "' "              
                . "WHERE id_books_reviews='" . $id_books_reviews . "';";

        return DB::getInstance()->query($review_edit);
    }

    public static function reviewDelete($id) {

        $review_delete = "DELETE FROM books_reviews "
                . "WHERE id_books_reviews='" . $id . "';";

        return DB::getInstance()->query($review_delete);
    }
}

?>



