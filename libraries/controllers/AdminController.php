<?php

session_start();

class AdminController extends Controller {

    public function actionAddBook() {
        
        if(!empty($_POST)) {
            // INSERT DO DB
            echo 'Vlozenie';
        }

        $categories = Admin::categorySelectCombo();
        $select_category = '<select name="category">';
        foreach ($categories as $category) {
            $select_category .= '<option value="' . $category['id_category'] . '">' . $category['category_name'] . '</option>';
        }
        $select_category .= '</select>';

        $authors = Admin::authorsSelectCombo();
        $select_authors = '<select name="author">';
        foreach ($authors as $author) {
            $select_authors .= '<option value="' . $author['id_author'] . '">' . $author['author_name'] . '</option>';
        }
        $select_authors .= '</select>';

        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Add Book';
        $datapost['categories'] = $select_category;
        $datapost['authors'] = $select_authors;

        $this->render('adminAddBook', $datapost, 'register');
        
    }

}
?>

