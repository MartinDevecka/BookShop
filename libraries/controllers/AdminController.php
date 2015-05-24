<?php

session_start();

class AdminController extends Controller {

    public function actionAddBook() {

        $categories = Admin::categorySelectCombo();
        $select_category = '<select name="category">';
        foreach ($categories as $category) {
            $select_category .= '<option value="' . $category['id_category'] . '">' . $category['category_name'] . '</option>';
        }
        $select_category .= '</select>';

        $authors = Admin::authorSelectCombo();
        $select_author = '<select name="author">';
        foreach ($authors as $author) {
            $select_author .= '<option value="' . $author['id_author'] . '">' . $author['author_name'] . '</option>';
        }
        $select_author .= '</select>';

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Book';
        $datapost['categories'] = $select_category;
        $datapost['authors'] = $select_author;

        if (!empty($_POST)) {
            Admin::bookAdd($_POST);
            $datapost['success'] = 'Book was added successfuly...';
            $this->render('adminAddBook', $datapost, 'admin');
        } else {
            $datapost['success'] = 'Add book here or try insert via database...';
            $this->render('adminAddBook', $datapost, 'admin');
        }
    }

    public function actionFindBook() {

        $book_select_all = Admin::bookSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Book';
        $datapost['book_select_all'] = $book_select_all;

        if (!empty($_GET)) {
            $datapost['success'] = 'Find books success...';
            $this->render('adminEditBook', $datapost, 'admin');
        } else {
            $datapost['error'] = 'Find books failed, add some into database...';
            $this->actionAddBook();
        }
    }

    public function actionEditBook() {
        
        $book_select_all = Admin::bookSelectAll();

        $categories = Admin::categorySelectCombo();
        $select_category = '<select name="category">';
        foreach ($categories as $category) {
            $select_category .= '<option value="' . $category['id_category'] . '">' . $category['category_name'] . '</option>';
        }
        $select_category .= '</select>';

        $authors = Admin::authorSelectCombo();
        $select_author = '<select name="author">';
        foreach ($authors as $author) {
            $select_author .= '<option value="' . $author['id_author'] . '">' . $author['author_name'] . '</option>';
        }
        $select_author .= '</select>';           
            
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit Book'; 
        $datapost['categories'] = $select_category;
        $datapost['authors'] = $select_author;  
        //$datapost['book_select_all'] = $book_select_all;
        $datapost['book'] = ''; 

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if ($result = Admin::bookSelect($route[2])) {
                $datapost['book'] = $result; 
                //Admin::bookEdit($data);
                $datapost['success'] = 'Search successful, redirecting to book edit form... ';               
                $this->render('adminEditBookForm', $datapost, 'admin');
            } else {
                //$datapost['error'] = 'Edit error...';
                $this->render('adminEditBookForm', $datapost, 'admin');
            }
        } else {
            //$datapost['error'] = 'Edit error...';
            $this->render('adminEditBookForm', $datapost, 'admin');
        }
    }      

    public function actionDeleteBook() {

        $book_select_all = Admin::bookSelectAll();

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Edit/Delete Book';
        $datapost['book_select_all'] = $book_select_all;

        // url coming from form
        $route = explode('/', $_GET['r']);
        if (!empty($_GET)) {
            // third[2] element of url is id_book 
            if (Admin::bookDelete($route[2])) {
                $datapost['success'] = 'Book was deleted successfuly...';
                $this->render('adminEditBook', $datapost, 'admin');
            } else {
                $datapost['error'] = 'Book delete failed...';
                $this->render('adminEditBook', $datapost, 'register');
            }
        } else {
            $datapost['error'] = 'Book delete failed...';
            $this->render('adminEditBook', $datapost, 'register');
        }
    }
}
?>

