<?php

session_start();

class BookController extends Controller {

    public function actionSearch() {

        $search = isset($_POST['book_search']) ? $_POST['book_search'] : null;

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Search results';
        $datapost['search_result'] = '';

        if (!empty($_POST)) {
            if (!empty($search)) {
                if ($result = Book::bookSearch($_POST)) {
                    $datapost['success'] = 'Search successful, redirecting to results... ';
                    $datapost['search_result'] = $this->bookShowLink($result);
                    $this->render('bookSearchResult', $datapost, 'register');
                } else {
                    $datapost['error'] = 'Feel free to search again...';
                    $this->render('bookSearchFailed', $datapost, 'register');
                }
            } else {
                $datapost['error'] = 'Feel free to search again...';
                $this->render('bookSearchFailed', $datapost, 'register');
            }
        } else {
            $datapost['error'] = 'Feel free to search again...';
            $this->render('bookSearchFailed', $datapost, 'register');
        }
    }

    public function bookShowLink($result) {
        $table = '';
        foreach ($result as $book) {
            $table .= '
        <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">       
        <tr>
            <td width="30%">
                Title:
            </td>          
            <td><a href="' . $this->app->getBaseUrl() . 'book/detail/' . $book['id_book'] . '">'
                    . $book['book_title'] .
                    '</a></td>
        </tr>       
        <tr>
            <td width="30%">
                Price:
            </td>           
            <td>'
                    . $book['book_price'] .
                    '</td>
        </tr>
        <tr>
            <td width="30%">
                Discount:
            </td>           
            <td>'
                    . $book['book_discount'] .
                    '</td>
        </tr>
        <tr>
            <td width="30%">               
            </td>           
            <td>
                <a href="' . $this->app->getBaseUrl() . 'book/detail/' . $book['id_book'] . '">'
                    . '<img height="100" src="' . $this->app->getBaseUrl() . 'img/' . $book['book_image'] . '"/></a>             
            </td>
        </tr>            
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">'
                    . (isset($_SESSION['logged']) ? '
                <button type="submit" class="btn btn-success">If logged in, download for free</button> </td>
                ' : '<td> <a href="' . $this->app->getBaseUrl() . '" class="btn btn-danger" role="button">Buy</a> </td>') . '                                                            
        </tr>
    </table>
    <hr/>';
        }
        return $table;
    }

    public function actionDetail() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Book detail';
        $datapost['search_result'] = '';
        
        // url coming from function bookShowLink
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Book::bookDetail($route[2])) {
                $datapost['success'] = 'Search successful, redirecting to book detail... ';
                $datapost['search_result'] = $this->bookShowDetail($result);
                $this->render('bookSearchResult', $datapost, 'register');
            } else {
                $datapost['error'] = 'Feel free to search again...';
                $this->render('bookSearchFailed', $datapost, 'register');
            }
        } else {
            $datapost['error'] = 'Feel free to search again...';
            $this->render('bookSearchFailed', $datapost, 'register');
        }
    }

    public function bookShowDetail($book) {
        $table = '
        <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>
            <td width="30%">
                Category:
            </td>          
            <td>'
                . $book['category_name'] .
                '</td>
        </tr>
        <tr>
            <td width="30%">
                Title:
            </td>          
            <td>'
                . $book['book_title'] .
                '</td>
        </tr>
        <tr>
            <td width="30%">
                Author:
            </td>           
            <td>'
                . $book['author_name'] .
                '</td>
        </tr>
        <tr>
            <td width="30%">
                ISBN:
            </td>           
            <td>'
                . $book['book_ISBN'] .
                '</td>
        </tr>
        <tr>
            <td width="30%">
                Price:
            </td>           
            <td>'
                . $book['book_price'] .
                '</td>
        </tr>
        <tr>
            <td width="30%">
                Discount:
            </td>           
            <td>'
                . $book['book_discount'] .
                '</td>
        </tr>
        <tr>
            <td width="30%">               
            </td>           
            <td>
                <img width="200" src="' . $this->app->getBaseUrl() . 'img/' . $book['book_image'] . '"/>              
            </td>
        </tr>
        <tr>
            <td width="30%">  
                Summary:
            </td>           
            <td>'
                . $book['book_subject'] .
                '</td>
        </tr>        
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>     
        <tr>
            <td width="30%">'
                . (isset($_SESSION['logged']) ? '
                <button type="submit" class="btn btn-success">If logged in, download for free</button> </td>
                ' : '<td> <a href="' . $this->app->getBaseUrl() . '" class="btn btn-danger" role="button">Buy</a> </td>') . '
                    <td> <a href="' . $this->app->getBaseUrl() . '" class="btn btn-danger" role="button">Review</a> </td>
        </tr>
    </table>';
        return $table;
    }
}

?>
