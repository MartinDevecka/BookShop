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
                    $datapost['search_result'] = $this->bookShowLink($result, 'book/search');
                    $this->render('bookSearchResult', $datapost);
                } else {
                    $datapost['error'] = 'Feel free to search again...';
                    $this->render('bookSearchFailed', $datapost);
                }
            } else {
                $datapost['error'] = 'Feel free to search again...';
                $this->render('bookSearchFailed', $datapost);
            }
        } else {
            $datapost['error'] = 'Feel free to search again...';
            $this->render('bookSearchFailed', $datapost);
        }
    }

    public function actionShowBooks() {
        $category = NULL;
        $bookId = NULL;
        $userId = isset($_SESSION['logged']) ? $_SESSION['logged'] : User::GetUserId();
        if (strpos($_SERVER['REQUEST_URI'], "=") !== false) {
            $category = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
            if (strpos($category, "=") !== false) {
                $bookId = substr($category, strpos($category, "=") + 1);
                Basket::AddBookToBasket($userId, $bookId);
            }
        }
        if (strpos($category, "&") !== false) {
            $category = substr($category, 0, strpos($category, '&'));
        }
        if ($category != NULL) {
            $catArray = array('book_search' => $category);
        } else {
            $catArray = NULL;
        }
        if ($result = Book::bookSearch($catArray)) {
            $datapost['search_result'] = $this->bookShowLink($result, $category);
            $datapost['category'] = $category;
            $this->renderCategories('categories', 'bookSearchResult', $datapost);
        } else {
            $datapost['error'] = 'No books found in database.';
            $this->renderCategories('categories', 'bookSearchFailed', $datapost);
        }
    }

    public function actionAllBooks() {
        $this->actionShowBooks();
    }

    public function bookShowLink($result, $page) {
        $userId = isset($_SESSION['logged']) ? $_SESSION['logged'] : User::GetUserId();
        $table = '<div id="searchPanelWraper">';
        foreach ($result as $book) {
            $table .= '<div class="searchPanel panel panel-primary">
                            <div class="panel-heading">
                              <h3 class="panel-title text-center">' . $book['book_title'] . '</h3>
                            </div>
                            <div class="panel-body text-center">
                                <a href="' . $this->app->getBaseUrl() . 'book/detail/' . $book['id_book'] . '#showRedirect" class="bookPanelLink">
                                    <img class="searchPanelImage" src="' . $this->app->getBaseUrl() . 'images/books/' . $book['book_image'] . '"/>
                                </a>
                                <p class="searchPanelPrice">' . $book['book_price'] . ' €</p>'
                                . (Basket::IsBookDownloadable($userId, $book['id_book']) ? '
                                <button class="searchPanelButton btn btn-success pull-right" type="submit" >Download</button>' : '<a href="' . $this->app->getBaseUrl() . 'book/showbooks?category=' . $page . '&id=' . $book['id_book'] . '#showRedirect" class="searchPanelButton btn btn-danger pull-right" role="button" ' . (Basket::IsBookInBasket($userId, $book['id_book']) ? 'disabled' : '') . ' >Add to Basket</a>') . '
                            </div>
                        </div>';
        }
        $table .= '</div>';

        return $table;
    }

    public function actionDetail($book_id = NULL) {

        $datapost['error'] = '';
        $datapost['title'] = 'Book detail';
        $datapost['search_result'] = '';

        // url coming from function bookShowLink      
        $route = explode('/', $_GET['r']);
        $book_id = $book_id != NULL ? $book_id : $route[2];

        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Book::bookDetail($book_id)) {
                $datapost['search_result'] = $this->bookShowDetail($result);
                $this->render('bookSearchResult', $datapost);
            } else {
                $datapost['error'] = 'Feel free to search again...';
                $this->render('bookSearchFailed', $datapost);
            }
        } else {
            $datapost['error'] = 'Feel free to search again...';
            $this->render('bookSearchFailed', $datapost);
        }
    }

    public function bookShowDetail($book) {
        $table = '
        <table class="table-borderless" style="border-collapse: separate; border-spacing: 3px;">
        <tr>         
            <td class="bookDetailImage" rowspan="' . (($book['book_discount'] != NULL) ? 7 : 6) . '" ><img height="500" src="' . $this->app->getBaseUrl() . 'images/books/' . $book['book_image'] . '"/></td>
            <td class="bookDetailData">Category:</td>          
            <td>' . $book['category_name'] . '</td>
        </tr>
        <tr>
            <td class="bookDetailData">Title:</td>          
            <td>' . $book['book_title'] . '</td>
        </tr>
        <tr>
            <td class="bookDetailData">Author:</td>           
            <td>' . $book['author_name'] . '</td>
        </tr>
        <tr>
            <td class="bookDetailData">ISBN:</td>           
            <td>' . $book['book_ISBN'] . '</td>
        </tr>
        <tr>
            <td class="bookDetailData">Price:</td>           
            <td>' . $book['book_price'] . '</td>
        </tr>' . (($book['book_discount'] != NULL) ? '
        <tr>
            <td class="bookDetailData">Discount:</td>           
            <td>' . $book['book_discount'] . '</td>
        </tr>' : "") . '
        <tr>       
            <td>' . (isset($_SESSION['logged']) ?
                '<form method="post" action="' . $this->app->getBaseUrl() . '/book/newreview" enctype="multipart/form-data">
                    <input type="hidden" name="id_book" value="' . $book['id_book'] . '"/>
                    <input type="hidden" name="id_user" value="' . $_SESSION['logged'] . '"/>
                    <button type="submit" class="btn btn-success btn-xlg">Add Review</button>
                </form>' :
                '<a href="' . $this->app->getBaseUrl() . 'user/login#showRedirect" class="btn btn-success" role="button">Log in to review</a>') . '
            </td>
            <td class="bookDetailBtn">' . (isset($_SESSION['logged']) ? '
                <button type="submit" class="btn btn-primary btn-xlg">Download</button>
                ' : '<a href="' . $this->app->getBaseUrl() . '" class="btn btn-success btn-xlg" role="button">Buy</a>') . '
            </td>
        </tr>
        <tr>
            <td>Summary:</td>           
            <td colspan="2">' . $book['book_subject'] . '</td>
        </tr>
        <tr>
        
        </tr>
    </table>';
        return $table;
    }

    public function actionNewReview() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'New Review';
        $datapost['id_user'] = isset($_POST['id_user']) ? $_POST['id_user'] : '';
        $datapost['id_book'] = isset($_POST['id_book']) ? $_POST['id_book'] : '';

        if (!empty($_POST['id_user']) && !empty($_POST['id_book'])) {
            $datapost['success'] = 'Please add book review.';
            $this->render('bookAddReview', $datapost);
        } else {
            $datapost['error'] = 'Can not add review for this book or from this user.';
            $this->render('adminAddReview', $datapost, 'admin');
        }
    }

    public function actionAddReview() {

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Review';
        $reviewData['id_user'] = isset($_POST['id_user']) ? $_POST['id_user'] : '';
        $reviewData['id_book'] = isset($_POST['id_book']) ? $_POST['id_book'] : '';
        $reviewData['book_review'] = isset($_POST['book_review']) ? $_POST['book_review'] : '';
        $reviewData['book_review_rate'] = isset($_POST['book_review_rate']) ? $_POST['book_review_rate'] : '';

        if (!empty($reviewData)) {
            Book::bookAddReview($reviewData);
            $datapost['success'] = 'Review was added successfuly, redirecting to reviews search results...';
            header('Location:' . $this->app->getBaseUrl() . 'book/detail/' . $reviewData['id_book'] . '#showRedirect');
        } else {
            $datapost['error'] = 'Add review failed...';
            $this->render('bookSearchFailed', $datapost);
        }
    }

    public function actionCategories() {
        $datapost['categoryMenu'] = true;
        $this->renderCategories('categories', '', $datapost);
    }
}

?>
