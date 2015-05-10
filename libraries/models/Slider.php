<?php

class Slider
{
    public static function Get4RandomBooksByCategoryId($app, $id)
    {
        $baseUrl = $app->getBaseUrl();
        $result = DB::getInstance()->query('SELECT id_book, book_title, book_image, book_price FROM books WHERE id_category = "' . $id . '" ORDER BY RAND() LIMIT 4');
        $books = '';
        
        while($book = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            $books .= '<div class="slide-book">
                    <p class="book-slide-title" >' . $book['book_title'] . '</p>
                    <div class="book-slide-data">
                        <p class="book-slide-price">' . $book['book_price'] . ' €</p>
                        <a href="' . $baseUrl . 'book/detail/' . $book['id_book'] . '" ><img class="book-slide-image" alt="' . $book['book_title'] . '" src="' . $baseUrl . 'images/books/' . $book['book_image'] . '" /></a>
                    </div>
                </div>';
        }
        
        return $books;
    }
    
    
    
}