<?php

session_start();

class BookController extends Controller {

    public function actionSearch() {

        $search = isset($_POST['book_search']) ? $_POST['book_search'] : null;

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Search results';

        if (!empty($_POST)) {
            if (!empty($search)) {
                if (Book::bookSearch($_POST)){
                    $datapost['success'] = 'Search successful, redirecting to results... ';
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
}

?>
