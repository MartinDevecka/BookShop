<?php

class Basket {

    public static function ShowBasket($userId) {
        $searchBasket = 'SELECT b.id_book, b.book_image, b.book_title, a.author_name, b.book_price '
                . 'FROM basket_items bi '
                . 'JOIN books b ON bi.id_book=b.id_book '
                . 'JOIN authors a ON b.id_author=a.id_author '
                . 'WHERE bi.id_user = ' . $userId . ' AND bi.basket_item_visibility = 1 '
                . 'ORDER BY a.author_name';

        if ($result = DB::getInstance()->query($searchBasket)) {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        } else {
            return false;
        }
    }

    public static function RemoveItemFromBasket($bookId, $userId) {
        $removeItem = 'DELETE FROM basket_items WHERE id_book = ' . $bookId . ' AND id_user = ' . $userId;
        if ($result = DB::getInstance()->query($removeItem)) {
            return true;
        } else {
            return false;
        }
    }

    public static function RemoveAllBasket($userId) {
        $removeBasket = 'DELETE FROM  WHERE id_user = ' . $userId;
        if ($result = DB::getInstance()->query($removeBasket)) {
            return $result;
        }
        return false;
    }

    public static function SaveOrder($userId, $order_payment_type, $totalPrice)
    {
        $insertOrder = "INSERT INTO orders(id_user, order_payment_type, order_paid, order_price) VALUES "
                . "(" . $userId . ", '" . $order_payment_type . "', 0, " . $totalPrice .")";
        $unsetBasketVisibility = "UPDATE basket_items
                                SET basket_item_visibility=0
                                WHERE basket_item_visibility = 1 AND id_user = " . $userId;
        
        if(DB::getInstance()->query($insertOrder) && DB::getInstance()->query($unsetBasketVisibility))
        {
            return true;
        }
        return false;
    }
    
    public static function AddBookToBasket($userId, $bookId)
    {
        $insertBookToBasket = "INSERT INTO basket_items(id_user, id_book, basket_item_visibility) VALUES"
                . "(" . $userId . ", " . $bookId . ", 1)";
        if($result = DB::getInstance()->query($insertBookToBasket))
        {
            return true;
        }
        return false;
    }
    
    public static function IsBookInBasket($userId, $bookId)
    {
        $bookInBasket = "SELECT id_basket_item FROM basket_items WHERE id_user=" . $userId . " AND id_book=" . $bookId;
        if($result = DB::getInstance()->query($bookInBasket))
        {
            if($result->num_rows > 0)
            {
                return true;
            }
        }
        return false;
    }
    
    public static function IsBookDownloadable($bookId)
    {
        $book = "SELECT id_books_paid FROM books_paid WHERE id_user=99 AND id_book=" . $bookId . " AND books_visibility=1";
        if($result = DB::getInstance()->query($book))
        {
            if($result->num_rows > 0)
            {
                return true;
            }
        }
        return false;
    }


    public static function IsBookDownloadableForUser($userId, $bookId)
    {
        $bookInBasket = "SELECT id_books_paid FROM books_paid WHERE id_user=" . $userId . " AND id_book=" . $bookId . " AND books_visibility=1";
        if($result = DB::getInstance()->query($bookInBasket))
        {
            if($result->num_rows > 0)
            {
                return true;
            }
        }
        return false;
    }
}
